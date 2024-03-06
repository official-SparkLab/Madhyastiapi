<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Complaint_Model;
use Illuminate\Http\Request;


class Complaint_Controller extends Controller
{
    // Add Complaints 

    public function addComplaint(Request $request)
    {
        $complaint = new Complaint_Model;

        $complaint->bio_id = $request->input('bio_id');
        $complaint->user_id = $request->input('user_id');
        $complaint->full_name = $request->input('full_name');
        $complaint->user_type = $request->input('user_type');
        $complaint->comp_desc = $request->input('comp_desc');
        $complaint->comp_date = $request->input('comp_date');
        $complaint->trans_from = $request->input('trans_from');

        $complaint->save();

        return response()->json(['message' => 'Complaint saved successfull', 'data' => $complaint, "status" => true], 201);
    }

    public function getComplaint()
    {
        $complaint = Complaint_Model::all();

        if ($complaint->isEmpty()) {
            return response()->json(['message' => 'No complaints are available', 'status' => false], 404);
        } else {
            return response()->json(['message' => 'Complaints Fetched Successfully', 'data' => $complaint, 'status' => true], 200);
        }
    }



    public function getComplaintByBioId($bio_id)
    {
        $complaints = Complaint_Model::where('bio_id', $bio_id)->get();


        if ($complaints->isEmpty()) {
            return response()->json(['message' => 'No complaints are available', 'status' => false], 404);
        } else {
            return response()->json(['message' => 'Complaints Fetched Successfully', 'data' => $complaints, 'status' => true], 200);
        }
    }
}
