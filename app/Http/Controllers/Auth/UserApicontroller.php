<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;

use App\Models\User;

class UserApicontroller extends Controller
{
    public function register(){

    	return response()->json([
    		            'message' => " register successfully.",
    	        ]);
    }

    public function login(Request $req)
    {
        if($req->isMethod('post')){
	        $rule = ['email' => 'required',
	    			'password' => 'required'];
	        $validator = Validator::make($req->all(), $rule);
	        if($validator->fails()){
	            return response()->json([
					'status' => false,
					'status_code' => true,
					'message' => $validator->messages()->first(),
					'results' => (object)[]
				]);
	        }else{
	            $email = $req->email;
	            $password = Hash::make($req->password);
	            $query = User::where(['email' => $email, 'password' => $password])->count();
	            if($query == 1){
	            	$user = User::where('email', $email,)->get();
	                return response()->json([
			            'status' => true,
			            'status_code' => true,
			            'message' => "Login successfully.",
			            'results' => [
			                'data' => $user
			            ]
			        ]);
	            }else{
	               	return response()->json([
						'status' => false,
						'status_code' => true,
						'message' => "Wrong email or password.",
						'results' => (object)[]
					]);
	            }
	        }
    	}
    }//end login function

     public function forgotPassword(Request $req){
    	$rule = ['email'=> "required"];
		$validator = Validator::make($req->all(), $rule);
		if($validator->fails()){
	    		return response()->json([
				'status' => false,
				'status_code' => true,
				'message' => $validator->errors()->first(),
				'results' => (object)[]
			]);
    	}
    	else{
    		$user = User::where('email', $req->email)->count();
			if($user == 1){
    			$otp_num = mt_rand(100000, 999999);
    			$SendOTP = $this->SendOTP($req->email, $otp_num);
    			date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d H:i:s');
                $user = User::where('email', $req->email)->first();
    			$update = Otp::where('id', $user->id)->update(['otp' => $otp_num]);
				if($update == 1){
    				return response()->json([
			            'status' => true,
			            'status_code' => true,
			            'message' => "We have sent an OTP to your ".$req->email.". Kindly use OTP to proceed.",
			            'results' => (object)[]
		        	]);
    			}
    		}else{
    			return response()->json([
					'status' => false,
					'status_code' => true,
					'message' => "Ooh! Looks like this phone number is not registered with us. Kindly register or use other registered id.",
					'results' => (object)[]
				]);
    		}
    	}
    }
}
