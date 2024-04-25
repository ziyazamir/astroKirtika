<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\Astrologer;
use App\Models\Banner;
use App\Models\Place;
use App\Models\Chamber;
use App\Models\TopAstrologerSelections;
use App\Models\Notification;
use App\Models\offers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Notifications\AstrologerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function userStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_data,email',
            'phone' => 'required|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $userData = new UserData;
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->phone = $request->phone;
        $userData->profile_image =  $request->file('profile_image')->store('images', 'public');
        $userData->status = $request->status;
        $userData->save();

        return Redirect()->route('home')->with('success', 'User Added Successfully');
    }

    public function astrologersStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:astrologers,email',
            'phone' => 'required|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size: 2MB
            'membership' => 'required|string|in:silver,gold,platinum',
            'status' => 'required|string|in:active,inactive',
        ]);

        $astrologer = new Astrologer;
        $astrologer->name = $request->name;
        $astrologer->email = $request->email;
        $astrologer->phone = $request->phone;
        $astrologer->profile_image =  $request->file('profile_image')->store('images', 'public');
        $astrologer->membership = $request->membership;
        $astrologer->status = $request->status;
        $astrologer->save();

        return Redirect()->route('home')->with('successs', 'Astrologer Added Successfully');
    }
    public function bannersStore(Request $request)
    {

        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_link' => 'url',
        ]);

        $banner = new Banner;
        $file = $request->file('banner_image');
        $img_name = $request->slug;
        $filename = $img_name . date('YmdHi') . "." . $file->extension();
        $file->move(public_path('Images/banner'), $filename);
        $banner->image_path = $filename;
        $banner->link = $request->banner_link;
        $banner->save();
        return redirect()->route('banner')->with('success', 'Banner added successfully.');
    }

    public function placeStore(Request $request)
    {

        $request->validate([
            'place_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place_heading' => 'required|string|max:255',
            'place_link' => 'url',
        ]);

        $place = new Place;
        $file = $request->file('place_image');
        $img_name = $request->slug;
        $filename = $img_name . date('YmdHi') . "." . $file->extension();
        $file->move(public_path('Images/place'), $filename);
        $place->place_image = $filename;
        $place->place_heading = $request->place_heading;
        $place->place_link = $request->place_link;
        $place->save();
        return redirect()->route('place')->with('success', 'Place added successfully.');
    }

    function bannerDelete($id)
    {
        $banner = Banner::find($id)->delete();
        return Redirect()->route('banner')->with('delete', 'Banner Deleted Successfully');
    }
    function notificationDelete($id)
    {
        $notification = Notification::find($id)->delete();
        return Redirect()->route('notification')->with('delete', 'Notification Deleted Successfully');
    }
    function placeDelete($id)
    {
        $place = Place::find($id)->delete();
        return Redirect()->route('place')->with('delete', 'Place Deleted Successfully');
    }
    function chamberDelete($id)
    {
        $chamber = Chamber::find($id)->delete();
        return Redirect()->route('chamber')->with('delete', 'Chamber Deleted Successfully');
    }

    function topastroDelete($id)
    {
        $TopAstrologerSelection = TopAstrologerSelections::find($id)->delete();
        return Redirect()->route('topastro')->with('delete', 'Chamber Deleted Successfully');
    }

    function bannerEdit($id)
    {
        $banner = Banner::find($id);
        return view('admin.edit.banneredit', compact('banner'));
    }

    function topAstroEdit($id)
    {
        $TopAstrologerSelection = TopAstrologerSelections::find($id);
        $astrologers = Astrologer::latest()->get();
        return view('admin.edit.topastroedit', compact('TopAstrologerSelection', 'astrologers'));
    }

    function placeEdit($id)
    {
        $place = Place::find($id);
        return view('admin.edit.placeedit', compact('place'));
    }
    function chamberEdit($id)
    {
        $chamber = Chamber::find($id);
        return view('admin.edit.chamberedit', compact('chamber'));
    }

    function bannerUpdate(Request $request, $id)
    {
        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_link' => 'url',
        ]);
        $banner = Banner::find($id)->update([
            'image_path' => $request->file('banner_image')->store('images', 'public'),
            'link' => $request->banner_link,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->route('banner')->with('success', 'Banner updated Successfully');
    }
    function placeUpdate(Request $request, $id)
    {
        $request->validate([
            'place_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'place_heading' => 'required|string|max:255',
            'place_link' => 'url',
        ]);
        $place = Place::find($id)->update([
            'place_image' => $request->file('place_image')->store('images', 'public'),
            'place_heading' => $request->place_heading,
            'place_link' => $request->place_link,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('place')->with('success', 'Place updated Successfully');
    }

    function topastroUpdate(Request $request, $id)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'selected_astrologers' => 'required|array',
            'selected_astrologers.*' => 'exists:astrologers,id',
        ]);
        $selectedAstrologers = implode(',', $request->selected_astrologers);
        $TopAstrologerSelection = TopAstrologerSelections::find($id)->update([
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'selected_astrologers' =>  $selectedAstrologers,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('topastro')->with('success', 'Place updated Successfully');
    }

    function chamberUpdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $chamber = Chamber::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->route('chamber')->with('success', 'Chamber updated Successfully');
    }

    public function updateStatus(Request $request)
    {
        // Retrieve item ID and new status from the AJAX request
        $itemId = $request->input('item_id');
        $newStatus = $request->input('status');

        // Update status in the database
        $item = UserData::find($itemId);
        if ($item) {
            $item->status = $newStatus;
            $item->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
    }
    public function updateStatusAstro(Request $request)
    {
        // Retrieve item ID and new status from the AJAX request
        $itemId = $request->input('item_id');
        $newStatus = $request->input('status');

        // Update status in the database
        $item = Astrologer::where('user_id', $itemId)->first();
        if ($item) {
            $item->status = $newStatus;
            $item->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
    }

    public function chamberStore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255', // You can adjust the validation rules as needed
        ]);

        // Create a new chamber instance
        $chamber = new Chamber();
        $chamber->name = $request->name;
        $chamber->description = $request->description;
        $chamber->save();

        // Redirect back with success message
        return redirect()->route('chamber')->with('success', 'Chamber name added successfully.');
    }




    public function sendNotification(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new notification instance
        $notification = new Notification();
        $notification->title = $request->input('title');
        $notification->description = $request->input('description');
        $notification->type = $request->input('type');
        $notification->save();

        // If the admin chooses to send to all astrologers
        // if ($request->has('send_to_all')) {
        //     $astrologers = Astrologer::all();
        //     foreach ($astrologers as $astrologer) {
        //         $astrologer->notifications()->save($notification);
        //     }
        // } else {
        //     // If the admin chooses to send to specific astrologers
        //     $astrologerIds = $request->input('astrologers', []);
        //     foreach ($astrologerIds as $astrologerId) {
        //         $astrologer = Astrologer::findOrFail($astrologerId);
        //         $astrologer->notifications()->save($notification);
        //     }
        // }

        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     // 'astrologers' => 'nullable|array',
        //     // 'send_to_all' => 'nullable|boolean',
        // ]);

        // $title = $validatedData['title'];
        // $description = $validatedData['description'];

        // if ($request->has('send_to_all') && $request->input('send_to_all')) {
        //     // Send notification to all astrologers
        //     Astrologer::where('status', 'active')->each(function ($astrologer) use ($title, $description) {
        //         $astrologer->notify(new AstrologerNotification($title, $description));
        //     });
        // } else {
        //     // Send notification to selected astrologers
        //     $selectedAstrologers = $validatedData['astrologers'];
        //     foreach ($selectedAstrologers as $astrologerId) {
        //         $astrologer = Astrologer::find($astrologerId);
        //         if ($astrologer) {
        //             $astrologer->notify(new AstrologerNotification($title, $description));
        //         }
        //     }
        // }



        return redirect()->back()->with('success', 'Notification sent successfully!');
    }

    public function saveTopAstrologers(Request $request)
    {
        // Validate the incoming request data
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            // 'astrologer_id' => 'required',
            'astrologer_id.*' => 'exists:astrologers,id', // Assuming the astrologers are stored in a table named 'astrologers'

        ]);

        if ($validator->fails()) {
            // die($validator->errors()->first());
            return back();
        }
        // $selectedAstrologers = implode(',', $validatedData['selected_astrologers']);
        // Save the top 50 astrologers and date range
        $offers = new offers;

        $offers->from_date = $request->from_date;
        $offers->to_date = $request->to_date;
        $offers->astrologer_id =  $request->astrologer_id;
        $offers->save();
        // Redirect back with success message
        return redirect()->back()->with('success', 'offer saved successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home'); // Redirect to dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
