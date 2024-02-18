<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\registration as ModelRegistrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registration extends Controller
{
    public function register(Request $request)
    {

        $registration = new ModelRegistrations;

        // Assign values to the model attributes
        $registration->full_name = $request->input('full_name');
        $registration->state = $request->input('state');
        $registration->district = $request->input('district');
        $registration->taluka = $request->input('taluka');
        $registration->village = $request->input('village');
        $registration->contact_no = $request->input('contact_no');
        $registration->password = $request->input('password');
        $registration->work_as = $request->input('work_as');
        $registration->adhar_no = $request->input('adhar_no');
        $registration->gender = $request->input('gender');
        $registration->user_type = $request->input('user_type');
        $registration->trans_from = $request->input('trans_from');
        // Save the model to the database
        $registration->save();


        // Return a response
        return response()->json(['message' => 'Registration successfull', 'data' => $registration, "status" => true], 201);
    }

    public function fetchRegisteredData()
    {
        // Retrieve all registration records from the database
        $registeredData = ModelRegistrations::all();

        // Return a response with the fetched data
        return response()->json(['message' => 'Fetched registered data successfully', 'data' => $registeredData], 200);
    }

    // Login function for user of madhyasthi
    public function login(Request $request)
    {
        $contact_no = $request->input('contact_no');
        $password = $request->input('password');

        // Retrieve the user from the database based on the provided email
        $user = DB::table('tbl_registration')->where('contact_no', $contact_no)->first();

        if ($user && $user->password === $password) {
            // Password matches, so user is authenticated

            return response()->json([
                'full_name' => $user->full_name,
                "user_id" => $user->user_id,
                "user_type" => $user->user_type,
                'message' => "Login Succesfully",
                "status" => true,
            ], 200);
        } else {
            // Invalid credentials, return unauthorized response
            return response()->json(['message' => "Login failed", "staus" => false], 401);
        }
    }

    public function fetchByUserType($userType)
    {
        $user = DB::select("select * from tbl_registration where user_type = $userType and is_active = 1");

        if ($user) {
            return response()->json(["data" => $user, "message" => "User found succesfully", "status" => true], 200);
        } else {
            return response()->json(["message" => "No data found", "status" => false], 404);
        }
    }
}
