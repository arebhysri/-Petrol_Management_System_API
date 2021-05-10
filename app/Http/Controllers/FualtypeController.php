<?php

namespace App\Http\Controllers;
use App\Models\Fualtype;
use Illuminate\Http\Request;

class FualtypeController extends Controller
{
    //get all record
    function getAllFuelType(){
        try{
            return Fualtype::all();
        }catch (Exception $ec){
            echo $ec;
        }
    }
}
