<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pumbertype;

class PumbertypeController extends Controller
{
    //get all record
    function getAllPumperType(){
        try{
            return Pumbertype::all();
        }catch (Exception $ec){
            echo $ec;
        }
    }
}
