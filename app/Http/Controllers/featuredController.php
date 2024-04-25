<?php

namespace App\Http\Controllers;

use App\Models\Astrologer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class featuredController extends Controller
{
    //
    public function index()
    {
        $astro = Astrologer::join('users', 'users.id', '=', 'astrologers.user_id')->where('featured', 1)->orderBy('id', 'desc')->get(['users.name', 'users.id']);
        $unfastro = Astrologer::join('users', 'users.id', '=', 'astrologers.user_id')->where('featured', 0)->orderBy('id', 'desc')->get(['users.name', 'users.id']);
        // return $astro->all();
        return view('pages.featured.all', ['astro' => $astro, 'unfastro' => $unfastro]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|exists:users',
            // 'validity' => 'required',
        ]);

        if ($validator->fails()) {
            // die($validator->errors()->first());
            return back();
        }
        $astrologer = Astrologer::where('user_id', $request->id)->first();
        $astrologer->featured = 1;
        $astrologer->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        // return 'hello';
        $astrologer = Astrologer::where('user_id', $id)->first();
        if ($astrologer) {
            // return $id;
            $astrologer->featured = 0;
            $astrologer->save();
            return redirect()->back();
        } else {
            return back();
        }
    }
}
