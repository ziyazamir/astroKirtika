<?php

namespace App\Http\Controllers;

use App\Models\chamberDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class chamberController extends Controller
{
    // "city" : "required|string",
    // "other_chamber" : "string",
    // "address" : "required|string",
    // "weekdays" : "required|string",
    // "start_time" : "required|string",
    // "end_time" : "string",
    // "chamber_id" : "required|string|exists:chambers,id",
    // "astrologer_id" : "required|integer|exists:astrologers,id",
    public function storeDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'city' => 'required|string',
            'address' => 'required|string',
            'weekdays' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'string',
            'chamber_id' => 'required|integer|exists:chambers,id',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',

            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $chamberDetails = new chamberDetails();
        if ($request->chamber_id == '0') {
            $chamberDetails->other_chamber = $request->other_chamber;
        };

        $chamberDetails->city = $request->city;
        $chamberDetails->location = $request->location;
        $chamberDetails->address = $request->address;
        $chamberDetails->weekdays = $request->weekdays;
        $chamberDetails->start_time = $request->start_time;
        $chamberDetails->end_time = $request->end_time;
        $chamberDetails->chamber_id = $request->chamber_id;
        $chamberDetails->astrologer_id = $request->astrologer_id;
        $chamberDetails->save();

        return response()->json(['status' => true, 'data' => $chamberDetails], 200);
    }

    public function getChambers($id)
    {
        $chambers = chamberDetails::with('chamber')->where('astrologer_id', $id)->get();

        return response()->json(['success' => true, 'data' => $chambers], 200);
    }
}
