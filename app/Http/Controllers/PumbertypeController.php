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

    //create and edit fuel type
    public function createNewPumb(Request $Request , $id){
    	try {
    		//create
            if($id == 0){
    		$fuelInventory = new Pumbertype();
    		$fuelInventory->Pumbertype=$Request->Pumbertype;
    		$fuelInventory->FualCode=$Request->FualCode;

    		$fuelInventory->save();
    		return response()->json([
                "message" => " Record created"
            ], 201);
			}else{
				//update
                $fuelInventory = new Pumbertype();
				$query =Pumbertype::where('Id',$id)
                ->update($fuelInventory = array(
                    'Pumbertype'=>$Request->Pumbertype,
                    'FualCode'=>$Request->FualCode
                ));

                return response()->json([
                    "message" => "records updated successfully"
                ], 200);
			}
    	} catch (Exception $e) {
    		return $e;
    	}
    }

    //get record by id
    function getSinglePumbRecordById($id){
    	try {
    		if (Pumbertype::where('Id', $id)->exists()) {
                $singleRecord = Pumbertype::where('Id', $id)->get()->toJson(JSON_PRETTY_PRINT);
                return response($singleRecord,200);
            } else {
                return response()->json([
                    "message" => "Record not found"
                ], 404);
            }
    	} catch (Exception $e) {
    		return $e;
    	}
    }

    //get record by fuelcode
    function getPumbRecordByFuelCode($fuelCode){
    	try {
    		if (Pumbertype::where('FualCode', $fuelCode)->exists()) {
                $singleRecord = Pumbertype::where('FualCode', $fuelCode)->get()->toJson(JSON_PRETTY_PRINT);
                return response($singleRecord,200);
            } else {
                return response()->json([
                    "message" => "Record not found"
                ], 404);
            }
    	} catch (Exception $e) {
    		return $e;
    	}
    }
}
