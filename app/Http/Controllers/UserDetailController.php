<?php

namespace App\Http\Controllers;


use App\Models\Userdetail;
use Illuminate\Http\Request;


class UserDetailController extends Controller
{
    public function userLoginCredentials($username,$password){
    	try {
    		if(Userdetail::where('username',$username)->exists()){
    			$userLogin = Userdetail:: 
    			where('username',$username)
    			->where('password',$password)
    			->get()->toJson(JSON_PRETTY_PRINT);
                return response($userLogin,200);
    		}else {
                return response()->json([
                    "message" => "Record not found"
                ], 404);
            }
    	} catch (Exception $e) {
    		return $exception;
    	}
    }
}
