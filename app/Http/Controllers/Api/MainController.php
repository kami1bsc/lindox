<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use URL;
use Carbon\Carbon;

class MainController extends Controller
{
    public function team_members($referral_code)
    {
        try{
            $code = User::where('my_referral_code', $referral_code)->first('id');

            if(empty($code))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'This Referral Code is not Associated with any User',
                ], 200);
            }

            $users = User::where('referral_code', $referral_code)->paginate(12, ['id', 'username', 'referral_code','is_mining', 'hash_rate']);

            $total_members = User::where('referral_code', $referral_code)->count();
            $active_members = User::where('referral_code', $referral_code)->where('is_mining', true)->count();

            return response()->json([
                'status' => true,
                'message' => $users->count() > 0 ? 'Team Members Found' : 'No Team Member Found',
                'data' => [
                    'total_members' => $total_members,
                    'active_members' => $active_members,
                    'all_members' => $users
                ],
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
 
