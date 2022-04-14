<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RidePost;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserWallet;

class NavigationController extends Controller
{  
    public function dashboard()
    {
      $count = DB::table('ride_posts')->count();
      $countpassenger =  User::where('type', '1')->count();
      $countdriver =  User::where('type', '2')->count();
      $countridetype = DB::table('ride_types')->count();
        return view('admin.dashboard', compact('count','countpassenger', 'countdriver', 'countridetype'));
        
    }

    public function admin_logout()
    {
        try{
            Auth::logout();

            return redirect()->route('login');
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => 'There is some trouble to proceed your action',
                'data' => json_decode('{}'),
            ], 200);
        }
    }

    public function get_deposite($user_id)
    {
        try{
            $user = User::where('id', $user_id)->first();

            if(empty($user))
            {
                return back()->with('error', 'User does not Exists');
            }

            $deposite_history = UserWallet::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(12);

            return view('admin.users.deposite', compact('deposite_history', 'user_id'));
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action');
        }
    }

    public function deposite_amount($deposite_id)
    {
        try{
            $deposite = UserWallet::find($deposite_id);
            
            if(empty($deposite))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Deposite Does not Exists',
                    'data' => json_decode('{}'),
                ], 200);
            }

            $deposite->deposite_status = 'added';
            $deposite->save();

            $user = User::find($deposite->user_id);
            $user->wallet_balance = $user->wallet_balance + $deposite->deposite_amount;
            $user->save();            

            return back()->with('message', 'Amount Deposited Successfully');
            
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action');
        }
    }
}
