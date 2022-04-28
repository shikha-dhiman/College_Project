<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterApiAuthController extends Controller
{
    public function register(Request $req)
    {
    	if($req->isMethod('post')){

    	   $rule = ['name' => "required|regex:/^[a-zA-Z-' ]*$/|",
    	   			'password' => 'required|min:8',
    	   			'email' => "required",
    	   			'dob' => 'required',
	                'mobile' => 'required|min:10|unique:users',
	                'image' => "mimes:jpeg,jpg,png|max:2048"
            	];
	       $validator = Validator::make($req->all(), $rule);
	       if($validator->fails()){
	            return response()->json([
				'status' => false,
				'status_code' => true,
				'message' => $validator->messages()->first(),
				'results' => (object)[]
			]);
	        }else{
	        	$photo = "";
	            if($req->file()) {
	                $data = $req->input('image');
	                $photo = $req->file('image')->getClientOriginalName();
	                $destination = base_path() . '/public/user_asset/images';
	                $req->file('image')->move($destination, $photo);
	            }
	    		date_default_timezone_set('Asia/Kolkata');
	    		$date = date('Y-m-d H:i:s');
	    		$user_id = rand();
	    		$otp_num = mt_rand(100000, 999999);
	    		$SendOTP = $this->SendOTP($req->mobile, $otp_num);
				$user = new User;
	    		$user->user_id = $user_id;
	    			$user->name = $req->name;
    			$user->email = $req->email;
    			$user->mobile =  $req->mobile;
    			$user->dob = $req->dob;
    			$user->profile_image = $photo;
    			$user->password = base64_encode($req->password);
    			$user->is_number_verified = 0;
    			$user->is_active = 1;
				$user->save();
				$otp = new otp;
				$otp->user_id = $user_id;
				$otp->otp = $otp_num;
				$otp->is_active = 1;
				$otp->save();
				return response()->json([
		            'status' => true,
		            'status_code' => true,
		            'message' => "Register successfully.",
		            'results' => [
		                'data' => [
		                	'user_id' => $user->user_id,
		                	'is_number_verified' => $user->is_number_verified
		                ] 
		            ]
	        	]);
    		}
    	}
    }
}
