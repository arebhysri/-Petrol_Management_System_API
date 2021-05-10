<?php

namespace App\Http\Controllers;

use App\Models\Fuelinventorydetail;
use Illuminate\Http\Request;

class FuelinventorydetailController extends Controller
{
    //create new fuel inventory
    public function createNewFuelInventory(Request $Request , $id){
    	try {
    		//create
            if($id == 0){
    		$fuelInventory = new Fuelinventorydetail();
    		$fuelInventory->UserName=$Request->UserName;
    		$fuelInventory->FuelType=$Request->FuelType;
    		$fuelInventory->PumperType=$Request->PumperType;
    		$fuelInventory->ClosingAmount=$Request->ClosingAmount;
    		$fuelInventory->OpeningAmount=$Request->OpeningAmount;
    		$fuelInventory->TestingAmount=$Request->TestingAmount;
    		$fuelInventory->TotalQuantiy=$Request->TotalQuantiy;
    		$fuelInventory->TotalPrice=$Request->TotalPrice;
    		$fuelInventory->CreatedDate=$Request->CreatedDate;
    		$fuelInventory->FuelPrice=$Request->FuelPrice;

    		$fuelInventory->save();
    		return response()->json([
                "message" => " Record created"
            ], 201);
			}else{
				//update
                $fuelInventory = new Fuelinventorydetail();
				$query =Fuelinventorydetail::where('Id',$id)
                ->update($fuelInventory = array(
                    'UserName' => $Request->UserName,
                    'FuelType'=>$Request->FuelType,
                    'PumperType'=>$Request->PumperType,
                    'ClosingAmount'=>$Request->ClosingAmount,
                    'OpeningAmount'=>$Request->OpeningAmount,
                    'TestingAmount'=>$Request->TestingAmount,
                    'TotalQuantiy'=>$Request->TotalQuantiy,
                    'TotalPrice'=>$Request->TotalPrice,
                    'CreatedDate'=>$Request->CreatedDate,
                    'FuelPrice'=>$Request->FuelPrice)
                );

                return response()->json([
                    "message" => "records updated successfully"
                ], 200);
			}
    	} catch (Exception $e) {
    		return $e;
    	}
    }

    //get all record
    function getAllRecord(){
        try{
            return Fuelinventorydetail::orderBy('CreatedDate', 'DESC')->get();
        }catch (Exception $ec){
            echo $ec;
        }
    }

    //get record by id
    function getSingleRecordById($id){
    	try {
    		if (Fuelinventorydetail::where('Id', $id)->exists()) {
                $singleRecord = Fuelinventorydetail::where('Id', $id)->get()->toJson(JSON_PRETTY_PRINT);
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
