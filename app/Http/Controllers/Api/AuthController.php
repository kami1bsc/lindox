<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Artisan;
use Illuminate\Support\Facades\Hash;
use App\Jobs\AccountVerificationEmailJob;
use App\Jobs\ForgotPasswordEmailJob;

class AuthController extends Controller
{
    //Signup
    public function signup(Request $request)
    {
        try{
            if(!$request->has('username') || $request->username == "")
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Username is Required',
                ], 200);
            }

            if(!$request->has('email') || $request->email == "")
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Email is Required',
                ], 200);
            }

            $already = User::where('email', $request->email)->first('id');

            if(!empty($already))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Email has already been Taken',
                ], 200);
            }

            if(!$request->has('password') || $request->password == "")
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Password id Required',
                ], 200);
            }

            if(!$request->has('confirm_password') || $request->confirm_password == "")
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Confirm Password is Required',
                ], 200);
            }

            if($request->password != $request->confirm_password)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Password and Confirm Password are not Same',
                ], 200);
            }

            $user = new User;
            $user->username = $request->username;
            $user->email = $request->email;          
            $user->password = bcrypt($request->password);
            $user->save();

            $user1 = User::find($user->id);

            return response()->json([
                'status' => true,
                'message' => "Glad You've Joined Us",
                'data' => $user1,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action',
            ], 200);
        }
    }

    // Login Method
    public function login(Request $request)
    {        
        $loginData = $request->validate([
            'username' => 'string|required',
            'password' => 'required|max:255'
        ]);
        
        if(!auth()->attempt($loginData))
        {
            if($request->expectsJson())
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Credentials',
                ], 200);
            }           
        }

        $user1 = User::where('id', auth()->user()->id)->first();

        return response()->json([
            'status' => true,
            'message' => "Glad You've Joined Us",
            'data' => $user1,
        ], 200); 
                     
    }

    //Forgot Password
    public function forgot_password($email)
    {
        try{
            $user = User::where('email', $email)->first();
            
            if(empty($user))
            {               
                return response()->json([
                    'status' => false,
                    'message' => 'User does not exists!',
                ], 200);                
            }

            $code = rand(1111, 9999);
            // $user->verification_code = $code;
            // $user->save();
            // \Mail::to($request->email)->send(new ForgotPassword($code)); 
            $details['email'] = $email;
            $details['code'] = $code;
  
            dispatch(new ForgotPasswordEmailJob($details));           
            
            return response()->json([
                'status' => true,
                'message' => 'A Verification Code has been Sent to your Email!',
                'data' => [
                    'email' => $email,
                    'code' => json_decode($code),
                ],
            ], 200);            
            
        }catch(\Exception $e)
        {            
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action!',
            ], 200);            
        }
    }

    //Reset Password
    public function reset_password(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();

            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not Exists',
                ], 200);
            }

            if($request->has('password') && $request->password != "")
            {
                if($request->has('confirm_password') && $request->confirm_password != "")
                {
                    if($request->password === $request->confirm_password)
                    {
                        $user->password = bcrypt($request->password);
                        $user->Save();

                        $user1 = User::where('email', $request->email)->first();                        

                        return response()->json([
                            'status' => true,
                            'message' => 'Password Changed Successfully!',
                            'data' => $user1,
                        ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Password and Confirm Password are not Same',
                        ], 200); 
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Confirm Password is Required',
                    ], 200);    
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Password is Required',
                ], 200);
            }
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action',
            ], 200);
        }
    }   

    //Logout
    public function logout($user_id)
    {
        try{
            $user = User::where('id', $user_id)->first(['id', 'token']);

            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not Exists',
                ], 200);
            }

            $user->token = "";
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Logged Out',
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action', 
            ], 200);
        }
    }

    //Edit Profile
    public function edit_profile(Request $request)
    {
        try{
            $user = User::where('id', $request->user_id)->first();

            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not Exists',
                ], 200);
            }

            if($request->has('username') && $request->username != "")
            {
                $user->username = $request->username; 
            }

            if($request->has('email') && $request->email != "")
            {
                $user->email = $request->email;
            }
            
            $user->save();

            $user1 = User::find($user->id);

            return response()->json([
                'status' => true,
                'message' => "Profile info Updated",
                'data' => $user1,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action',
            ], 200);
        }
    }

    //Change Password
    public function change_password(Request $request)
    {
        try{
            $user = User::find($request->user_id);

            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not exists!',                   
                ], 200);
            }

            if($request->has('old_password'))
            {
                if(Hash::check($request->old_password, $user->password))
                {   
                    $user->password = bcrypt($request->new_password);
                    if($user->save())
                    {
                        $user1 = User::find($request->user_id);                   

                        return response()->json([
                            'status' => true,
                            'message' => 'Password Changed Successfully!',
                            'data' => $user1,
                        ], 200);
                    }
                }else{                    
                    return response()->json([
                        'status' => false,
                        'message' => 'You Entered Wrong Password!',                            
                    ], 200);                
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'Password not Changed',
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action!',               
            ], 200);
        }
    }

    //Delete Account
    public function delete_account($user_id)
    {
        try{
            $user = User::find($user_id);

            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not Exists',
                ], 200);
            }

            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'Account Deleted',
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action',
            ], 200);
        }
    }

}
 