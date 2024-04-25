<?php

namespace App\Http\Controllers;

use App\Models\Membership as ModelsMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class membershipController extends Controller
{
    //
    public function index (){
        $membership = ModelsMembership::all()->reverse();
        // die($membership);
        return view('pages.membership.all',['membership'=>$membership]);
    }

    public function store(Request $request){
        // die($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'price' => 'required|integer',
            'validity' => 'required|integer',
            'description' => 'required|string',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return back();
        }

        $membership = new ModelsMembership();
        $membership->title = $request->title;
        $membership->price = $request->price;
        $membership->validity = $request->validity;
        $membership->description = $request->description;

        $membership->save();
         return redirect('/membership');
    }
    public function update(Request $request){
        // die($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'price' => 'required|integer',
            'validity' => 'required|integer',
            'description' => 'required|string',
            'id' => 'required|integer|exists:memberships',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            die($validator->errors()->first());
            return back();
        }

        $membership =  ModelsMembership::find($request->id);
        $membership->title = $request->title;
        $membership->price = $request->price;
        $membership->validity = $request->validity;
        $membership->description = $request->description;

        $membership->save();
         return redirect('/membership');
    }

    public function delete($id){
        $membership=ModelsMembership::find($id)->delete();
        return Redirect()->route('membership.all')->with('delete','Notification Deleted Successfully');
    }

    public function edit($id){
       $membership = ModelsMembership::find($id);
       if($membership){
            return view('pages.membership.edit',['membership'=>$membership]);

        }
    return back();
       
    }

    // API Functions 
    public function getMembership(){
        $membership = ModelsMembership::all();
        return response()->json(['status' => 200,
        'data' => $membership,], 200);
    }
}
