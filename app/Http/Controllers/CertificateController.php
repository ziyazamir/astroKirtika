<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class CertificateController extends Controller
{
    //
    public function getCertificate($id){
        $certificate = certificate::where('astrologer_id',$id)->get();
        if($certificate){
            return response()->json(['success'=>true,'data'=>$certificate],200);
        }else{
            return response()->json(['success'=>false,'message'=>'astrologer id not macthed'],400);
            
        }
    }
    public function upload(Request $request){
        $validator = Validator::make($request->all(), [
            
            // 'membership_id' => 'required|integer|exists:memberships,id',
            'image' => 'required|image:jpeg,png,jpg,svg|max:2048',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400,
            'message' => $validator->errors()->first(),], 400);
        }

        $file = $request->file('image');
        $img_name = $request->slug;
        $filename = $img_name . date('YmdHi') . "." . $file->extension();
        $file->move(public_path('Images/certificates'), $filename);
       

        $certificate = new certificate();
        $certificate->image = $filename;
        $certificate->astrologer_id = $request->astrologer_id;
        $certificate->save();
        return response()->json(["success"=>true,'data'=>$certificate],200);
        // $paymentDetails->astrologer_id = $request->astrologer_id;


    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            'certificate_id' => 'required|integer|exists:certificates,id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400,
            'message' => $validator->errors()->first(),], 400);
        }

        $certificate = certificate::find($request->certificate_id);
        $image_path = "images/certificates/" . $certificate->image;  // Value is not URL but directory file path
            // echo $image_path;
            if (File::exists($image_path)) {
                File::delete($image_path);
            };
        $certificate->delete();

        return response()->json(['success'=>true,'message'=>'certificate deleted succesfully'],200);
    }
}
