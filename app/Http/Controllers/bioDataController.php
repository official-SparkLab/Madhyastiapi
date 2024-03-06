<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bioDataModel;
use Illuminate\Http\Request;

class bioDataController extends Controller
{
    //

    public function addBioData(Request $request)
    {

        $bioData = new bioDataModel;

        // Assign values to the model attributes
        $bioData->user_id = $request->input('user_id');
        $bioData->full_name = $request->input('full_name');
        $bioData->date_of_birth = $request->input('date_of_birth');
        $bioData->birth_time = $request->input('birth_time');
        $bioData->gender = $request->input('gender');
        $bioData->cast = $request->input('cast');
        $bioData->education = $request->input('education');
        $bioData->district = $request->input('district');
        $bioData->taluka = $request->input('taluka');
        $bioData->village = $request->input('village');
        $bioData->adhar_no = $request->input('adhar_no');
        $bioData->contact_no = $request->input('contact_no');
        $bioData->expectations = $request->input('expectations');
        $bioData->upload_bio_data = $request->input('upload_bio_data');
        $bioData->user_type = $request->input('user_type');
        $bioData->trans_from = $request->input('trans_from');
        // Save the model to the database
        $bioData->save();


        // Return a response
        return response()->json(['message' => 'BioData saved successfull', 'data' => $bioData, "status" => true], 201);
    }

    public function fetchBioData()
    {
        // Retrieve all registration records from the database
        $bioData = bioDataModel::all();

        if ($bioData->isEmpty()) {
            return response()->json(['message' => 'No Bio data are available', 'status' => false], 404);
        } else {
            return response()->json(['message' => 'Bio Data Fetched Successfully', 'data' => $bioData, 'status' => true], 200);
        }
    }
}
