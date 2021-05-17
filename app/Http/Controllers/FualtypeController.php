<?php

namespace App\Http\Controllers;
use App\Models\Fualtype;
use App\Models\Pumbertype;
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

    //create and edit fuel type
    public function createNewFuelType(Request $Request , $id){
    	try {
    		//create
            if($id == 0){
    		$fuelInventory = new Fualtype();
    		$fuelInventory->FualType=$Request->FualType;
    		$fuelInventory->FualCode=$Request->FualCode;
    		$fuelInventory->Price=$Request->Price;

    		$fuelInventory->save();
    		return response()->json([
                "message" => " Record created"
            ], 201);
			}else{
				//update
                $fuelInventory = new Fualtype();
				$query =Fualtype::where('Id',$id)
                ->update($fuelInventory = array(
                    'FualType'=>$Request->FualType,
                    'FualCode'=>$Request->FualCode,
                    'Price'=>$Request->Price
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
    function getSingleFuelRecordById($id){
    	try {
    		if (Fualtype::where('Id', $id)->exists()) {
                $singleRecord = Fualtype::where('Id', $id)->get()->toJson(JSON_PRETTY_PRINT);
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
