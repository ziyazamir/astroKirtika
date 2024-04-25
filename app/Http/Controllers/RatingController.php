<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function index()
    {

        $ratingsUser = rating::join('users', 'users.id', '=', 'ratings.user_id')
            // ->join('astrologers', 'astrologers.id', '=', 'astrologers.membership_id')
            ->where('users.role', 'user')
            ->orderBy('users.id', 'desc')
            ->get(['users.*', 'ratings.*']);
        $ratingsAstro = rating::join('users', 'users.id', '=', 'ratings.astrologer_id')
            // ->join('astrologers', 'astrologers.id', '=', 'astrologers.membership_id')
            ->where('users.role', 'astrologer')
            ->orderBy('users.id', 'desc')
            ->get(['users.*', 'ratings.*']);
        // print_r($ratingsAstro);
        // return $ratingsUser->all();
        return view('pages.ratings.all', ['astro' => $ratingsAstro, "user" => $ratingsUser]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'user_id' => 'required|integer|exists:users,id',
            'rating' => 'required|integer:',
            'review' => 'required|string',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            // 'paymentdetails_id' => 'required|integer|exists:paymentsdetails,id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        };
        $rating = new rating();
        $rating->user_id = $request->user_id;
        $rating->astrologer_id = $request->astrologer_id;
        $rating->rating = $request->rating;
        $rating->review = $request->review;
        $rating->save();
        return response()->json(['success' => true, 'data' => $rating]);
    }
}
