<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\Astrologer;
use App\Models\Chamber;
use App\Models\Notification;
use App\Models\User;
use DB;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersdata = User::where('role', 'user')->get();
        return view('home', compact('usersdata'));
    }
    public function index2()
    {
        // $astrologers=User::with('astrologer')->with('membership')->where('role','astrologer')->latest()->paginate(10);
        // return $astrologers;
        $astrologers = User::join('astrologers', 'astrologers.user_id', '=', 'users.id')
            ->join('memberships', 'memberships.id', '=', 'astrologers.membership_id')
            ->orderBy('users.id', 'desc')
            ->get(['users.name', 'users.email', 'users.number', 'memberships.title', 'astrologers.status', 'users.id', 'astrologers.country', 'astrologers.fees', 'astrologers.languages', 'astrologers.total_experience']);
        // ->get();
        // return $astrologers;
        return view('astro', compact('astrologers'));
    }

    public function details($id)
    {
        // return $id;
        $astrologer = User::join('astrologers', 'astrologers.user_id', '=', 'users.id')
            ->join('memberships', 'memberships.id', '=', 'astrologers.membership_id')
            ->where('users.id', $id)
            ->orderBy('users.id', 'desc')
            ->get(['users.*', 'astrologers.*', 'memberships.*']);
        $chambers = Chamber::join('chamber_details', 'chamber_details.chamber_id', '=', 'chambers.id')
            ->where('chamber_details.astrologer_id', $id)->get();
        // return $chambers->all();
        return view('astrodetails', ["astrologer" => $astrologer[0]]);

        if ($astrologer) {
            return $astrologer;
        } else {
            return back();
        }
    }

    public function approve($task, $id)
    {
        $astrologer = Astrologer::find($id);
        if (!$astrologer) {
            return redirect()->back();
        }
        if ($task == 'approve') {
            $astrologer->status = 'active';
        } elseif ($task == 'disapprove') {
            $astrologer->status = 'inactive';
        } else {
            return redirect()->back();
        }
        $astrologer->save();
    }
}
