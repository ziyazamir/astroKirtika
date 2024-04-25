<?php

namespace App\Http\Controllers;

use App\Models\Astrologer;
use App\Models\AstroUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AstroController extends Controller
{
    public function login(Request $request)
    {
        // return ($request);
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
        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $user], 200);
        } else {

            return response()->json(['error' => 'Credentials Are Invalid'], 401);
        }
    }
    public function signInWithGoogle(Request $request)
    {
        // return ($request);
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $user], 200);
        } else {
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->role = 'user';
            $user->save();
            $userLogin = Auth::user();
            $token = $userLogin->createToken('AuthToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $userLogin], 200);
        }
        // $credentials = request(['email', 'password']);

        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     $token = $user->createToken('AuthToken')->plainTextToken;

        //     return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $user], 200);
        // } else {

        //     return response()->json(['error' => 'Credentials Are Invalid'], 401);
        // }
    }
    public function signInWithFacebook(Request $request)
    {
        // return ($request);
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $user], 200);
        } else {
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->role = 'user';
            $user->save();
            $userLogin = Auth::user();
            $token = $userLogin->createToken('AuthToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $userLogin], 200);
        }
        // $credentials = request(['email', 'password']);

        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     $token = $user->createToken('AuthToken')->plainTextToken;

        //     return response()->json(['status' => true, 'message' => 'Login Successfully', 'token' => $token, "data" => $user], 200);
        // } else {

        //     return response()->json(['error' => 'Credentials Are Invalid'], 401);
        // }
    }

    public function signup(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:users',
            'membership_id' => 'required|integer|exists:memberships,id',
            'country' => 'required|string',
            'phone' => 'required|string',
            'phone_code' => 'required|string',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'astrologer';
        $user->number = $request->phone;
        $user->save();

        $astrologer = new Astrologer();
        $astrologer->user_id = $user->id;
        $astrologer->phone_code = $request->phone_code;
        $astrologer->country = $request->country;
        $astrologer->membership_id = $request->membership_id;
        // $astrologer->password = bcrypt($request->password);
        // $user->syncRoles(['Astrologer']);
        $astrologer->save();



        return response()->json(['status' => true, 'message' => 'User registered successfully'], 201);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        // return $user;
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        if (!Hash::check($request->oldPassword, $user->password)) {
            return response()->json(['message' => 'Invalid old password'], 401);
        }
        $token = $user->createToken('AuthToken')->plainTextToken;
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return response()->json(['status' => true, 'message' => 'Password changed successfully', 'token' => $token, "data" => $user], 201);
    }

    public function forgotPassword(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'newPassword' => 'required|string|min:8',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        // Retrieve the user based on the provided email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        // Update the user's password with the new password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return response()->json(['status' => true, 'message' => 'Password changed successfully'], 200);
    }

    public function updateProfile(Request $request)
    {


        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'name' => 'required|string|max:255',
            'country' => 'required|string',
            'phone' => 'required|string',
            'phone_code' => 'required|string',
            'phone2' => 'string',
            'designation' => 'required|string',
            'languages' => 'required|string',
            'total_experience' => 'required|string',
            'fees' => 'required|string',
            'visit' => 'required|string',
            'w_number' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = User::find($request->user_id);
        $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->number = $request->phone;
        $user->save();

        $astrologer =  Astrologer::where('user_id', $user->id)->first();
        $astrologer->phone_code = $request->phone_code;
        $astrologer->country = $request->country;
        $astrologer->phone2 = $request->phone2;
        $astrologer->designation = $request->designation;
        $astrologer->languages = $request->languages;
        $astrologer->total_experience = $request->total_experience;
        $astrologer->fees = $request->fees;
        $astrologer->visit = $request->visit;
        $astrologer->w_number = $request->w_number;

        // $astrologer->password = bcrypt($request->password);
        // $user->syncRoles(['Astrologer']);
        $astrologer->save();



        return response()->json(['status' => true, 'message' => 'User data updated succesfully'], 200);
    }

    public function profileImageUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'image' => 'required|image:jpeg,png,jpg,svg|max:2048',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }


        $astrologer =  Astrologer::where('user_id', $request->astrologer_id)->first();
        $image_path = "Images/astroProfile/" . $astrologer->profile_image;  // Value is not URL but directory file path
        // echo $image_path;
        // return $image_path;
        if (File::exists($image_path)) {
            File::delete($image_path);
        };
        $file = $request->file('image');
        $img_name = $request->slug;
        $filename = $img_name . date('YmdHi') . "." . $file->extension();
        $file->move(public_path('Images/astroProfile'), $filename);
        $astrologer->profile_image = $filename;

        $astrologer->save();
        return response()->json(["success" => true, 'data' => $astrologer], 200);
    }
    public function introVideoUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'video' => 'required|mimes:mp4,mov,ogg,qt | max:20000',
            'astrologer_id' => 'required|integer|exists:astrologers,user_id',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }


        $astrologer =  Astrologer::where('user_id', $request->astrologer_id)->first();
        $image_path = "videos/astroIntroVideo/" . $astrologer->intro_video;  // Value is not URL but directory file path
        // echo $image_path;
        // return $image_path;
        if (File::exists($image_path)) {
            File::delete($image_path);
        };
        $file = $request->file('video');
        $img_name = $request->slug;
        $filename = $img_name . date('YmdHi') . "." . $file->extension();
        $file->move(public_path('videos/astroIntroVideo'), $filename);
        $astrologer->intro_video = $filename;

        $astrologer->save();
        return response()->json(["success" => true, 'data' => $astrologer], 200);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'membership_id' => 'required|integer|exists:memberships,id',
            'keyword' => 'required|in:country,name',
            'value' => 'required|string',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }
        //         User::query()
        //    ->where('name', 'LIKE', "%{$searchTerm}%") 
        //    ->orWhere('email', 'LIKE', "%{$searchTerm}%") 
        //    ->get();
        if ($request->keyword == "name") {
            $astrologer = User::query()
                ->where('name', 'LIKE', "%{$request->value}%")->where('status', 'active')
                ->get();
        } else {
            $astrologer =  Astrologer::query()
                ->where('country', 'LIKE', "%{$request->value}%")
                ->where('status', 'active')
                //    ->orWhere('email', 'LIKE', "%{$searchTerm}%") 
                ->get();
        };

        return response()->json(['success' => true, 'data' => $astrologer]);
    }

    public function searchByMembership($id)
    {
        $astrologer = Astrologer::where('membership_id', $id)->where('status', 'active')->get();
        return response()->json(['success' => true, 'data' => $astrologer]);;
    }
}
