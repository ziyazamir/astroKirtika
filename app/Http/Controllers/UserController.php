<?php

namespace App\Http\Controllers;

use App\Models\AstroUser;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function signup(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|string|max:10',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->role = 'user';
        $user->password = bcrypt($request->password);
        $user->syncRoles(['User']);
        $user->save();

        return response()->json(['status' => true, 'message' => 'User registered successfully'], 201);
    }
    public function getBannerData()
    {
        $data = Banner::latest()->get(); // Retrieve data from the database

        return response()->json(['data' => $data], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $user], 200);
        }

        return response()->json(['error' => 'Credentials Are Invalid'], 401);
    }

    public function getPlaceData()
    {
        $data = Place::latest()->get(); // Retrieve data from the database

        return response()->json(['data' => $data], 200);
    }
}
