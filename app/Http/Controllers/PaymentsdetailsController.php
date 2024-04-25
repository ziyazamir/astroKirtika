<?php

namespace App\Http\Controllers;

use App\Models\paymentsdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Return_;

class PaymentsdetailsController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'qr_image' => 'required|image:jpeg,png,jpg,svg|max:2048',
            'googlepay' => 'required|string',
            'paytm' => 'required|string',
            'phonepe' => 'string',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $file = $request->file('qr_image');
        $img_name = $request->slug;
        $filename = $img_name . date('YmdHi') . "." . $file->extension();
        $file->move(public_path('Images/astroPayments'), $filename);


        $paymentDetails = new paymentsdetails();
        $paymentDetails->qr_image = $filename;
        $paymentDetails->googlepay = $request->googlepay;
        $paymentDetails->phonepe = $request->phonepe;
        $paymentDetails->paytm = $request->paytm;
        $paymentDetails->astrologer_id = $request->astrologer_id;
        $paymentDetails->save();

        return response()->json(['success' => true, 'data' => $paymentDetails], 200);
        // $uploadedImageResponse = array(
        //     "image_name" => basename($image_uploaded_path),
        //     "mime" => $image->getClientMimeType()
        // );


    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'qr_image' => 'image:jpeg,png,jpg,svg|max:2048',
            'googlepay' => 'required|string',
            'paytm' => 'required|string',
            'phonepe' => 'required|string',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            // 'paymentdetails_id' => 'required|integer|exists:paymentsdetails,id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $paymentDetails = paymentsdetails::firstOrCreate(['astrologer_id' => $request->astrologer_id]);
        // return $paymentDetails;
        if ($paymentDetails->wasRecentlyCreated === true) {
            // return "created now";
            if (!$request->file('qr_image')) {
                return response()->json(['success' => false, 'message' => "No record find please upload image"]);
            } else {
                $file = $request->file('qr_image');
                $img_name = $request->slug;
                $filename = $img_name . date('YmdHi') . "." . $file->extension();
                $file->move(public_path('Images/astroPayments'), $filename);
                $paymentDetails->qr_image = $filename;
            }
        } else {
            // return "found";
            if ($request->file('qr_image')) {
                $image_path = "images/astroPayments/" . $paymentDetails->qr_image;  // Value is not URL but directory file path
                // echo $image_path;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $file = $request->file('qr_image');
                $img_name = $request->slug;
                $filename = $img_name . date('YmdHi') . "." . $file->extension();
                $file->move(public_path('Images/astroPayments'), $filename);
                $paymentDetails->qr_image = $filename;
            }
        }



        // $paymentDetails = new paymentsdetails();
        $paymentDetails->googlepay = $request->googlepay;
        $paymentDetails->phonepe = $request->phonepe;
        $paymentDetails->paytm = $request->paytm;
        $paymentDetails->astrologer_id = $request->astrologer_id;
        $paymentDetails->save();

        return response()->json(['success' => true, 'data' => $paymentDetails], 200);
        // $uploadedImageResponse = array(
        //     "image_name" => basename($image_uploaded_path),
        //     "mime" => $image->getClientMimeType()
        // );


    }

    public function getData($id)
    {
        $payment = paymentsdetails::where('astrologer_id', $id)->first();
        return response()->json(['success' => true, "data" => $payment]);
    }
}
