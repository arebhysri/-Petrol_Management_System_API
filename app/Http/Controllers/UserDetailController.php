<?php

namespace App\Http\Controllers;


use App\Models\Userdetail;
use Illuminate\Http\Request;


class UserDetailController extends Controller
{
    public function userLoginCredentials($username,$password){
    	try {
    		$query = Userdetail::select('userdetails.UserName','rolemanagements.Type')
    		->join('rolemanagements','userdetails.RoleId','=','rolemanagements.Id')
    		->where('userdetails.UserName',$username)
    		->where('userdetails.Password',$password)
    		->distinct()->get()->unique('rolemanagements.Id');
    		return response($query,200);
    	} catch (Exception $e) {
    		return $exception;
    	}
    }
}
