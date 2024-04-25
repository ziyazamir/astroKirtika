<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AstroController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\chamberController;
use App\Http\Controllers\membershipController;
use App\Http\Controllers\PaymentsdetailsController;
use App\Http\Controllers\RatingController;
use App\Models\Astrologer;
use App\Models\Chamber;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\offers;
use App\Models\paymentsdetails;
use App\Models\User;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('astrouser/register', [UserController::class, 'signup']);
Route::post('astrouser/login', [UserController::class, 'login']);
Route::post('astro/register', [AstroController::class, 'signup']);
Route::post('astro/login', [AstroController::class, 'login']);
Route::post('/forgotpassword', [AstroController::class, 'forgotPassword']);
Route::get('banner/data', [UserController::class, 'getBannerData']);
Route::get('place/data', [UserController::class, 'getPlaceData']);
Route::get('membership/all', [membershipController::class, 'getMembership']);

Route::middleware('auth:sanctum')->prefix('astro')->group(function () {
    Route::post('/currentuser', function (Request $request) {
        $user = $request->user();
        $data = User::with('astrologer')->find($user->id);
        return response()->json(['success' => true, 'data' => $data], 200);
    });
    Route::post('/user/update', [AstroController::class, 'updateProfile']);
    Route::post('/profileimage/upload', [AstroController::class, 'profileImageUpload']);
    Route::post('/introvideo/upload', [AstroController::class, 'introVideoUpload']);
    //chamber update
    Route::post('/chambers/add', [chamberController::class, 'storeDetails']);
    Route::get('/chambers/all/{id}', [chamberController::class, 'getChambers']);

    // manage payments 
    // Route::post('/payments/add', [PaymentsdetailsController::class, 'store']);
    Route::post('/payments/update', [PaymentsdetailsController::class, 'update']);
    Route::get('/payments/{id}', [PaymentsdetailsController::class, 'getData']);

    Route::post('/changepassword', [AstroController::class, 'changePassword']); //change astrologer password

    // manage certificates 
    Route::post('/certificate/upload', [CertificateController::class, 'upload']);
    Route::post('/certificate/delete', [CertificateController::class, 'delete']);
    Route::get('/certificate/all/{id}', [CertificateController::class, 'getCertificate']);
    Route::get('/notifications', function () {
        $noti = Notification::where('type', 'astrologer')->orderBy('id', 'desc')->get();
        return response()->json([['success' => true, 'data' => $noti]]);
    }); //notifications
});


// User Api
Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('/banner', [UserController::class, 'getBannerData']);
    Route::get('/place', [UserController::class, 'getPlaceData']);
    Route::post('/changepassword', [AstroController::class, 'changePassword']);
    Route::post('/signInWithGoogle', [AstroController::class, 'signInWithGoogle']);
    Route::post('/signInWithFacebook', [AstroController::class, 'signInWithFacebook']);
    Route::post('/currentuser', function (Request $request) {
        $user = $request->user();
        $data = User::with('astrologer')->find($user->id);
        return response()->json(['success' => true, 'data' => $data], 200);
    });

    Route::get('/astrologer/all', function () {
        $astrologers = Membership::join('astrologers', 'astrologers.membership_id', '=', 'memberships.id')
            // ->groupBy('memberships.title')
            ->where('astrologers.status', 'active')
            ->orderBy('astrologers.featured', 'desc')
            ->orderBy('astrologers.id', 'desc')
            ->get();
        return $astrologers;
    });
    Route::get('/astrologer/featured', function () {
        $astrologers = Membership::join('astrologers', 'astrologers.membership_id', '=', 'memberships.id')
            // ->groupBy('memberships.title')
            ->where('astrologers.status', 'active')
            ->where('astrologers.featured', 1)
            ->orderBy('astrologers.id', 'desc')
            ->get();
        return $astrologers;
    });
    Route::get('/astrologer/{id}', function ($id) {
        $astrologers = User::join('astrologers', 'astrologers.user_id', '=', 'users.id')
            ->join('memberships', 'memberships.id', '=', 'astrologers.membership_id')
            ->orderBy('users.id', 'desc')
            ->where('Users.id', $id)
            // ->get(['users.name', 'users.email', 'users.number', 'memberships.title', 'astrologers.status', 'users.id', 'astrologers.country', 'astrologers.fees', 'astrologers.languages', 'astrologers.total_experience']);
            ->get();
        return $astrologers;
    });

    Route::post('/rating', [RatingController::class, 'store']);
    Route::post('/search/astro', [AstroController::class, 'search']);
    Route::get('/search/astrologerByMembership/{id}', [AstroController::class, 'searchByMembership']);

    Route::get('/notifications', function () {
        $noti = Notification::where('type', 'user')->orderBy('id', 'desc')->get();
        return response()->json([['success' => true, 'data' => $noti]]);
    }); //notifications
    Route::get('/specialoffers', function () {
        $today = Carbon::today();
        $offers = offers::where('to_date', '>=', $today)->where('from_date', '<=', $today)->orderBy('id', 'desc')->get();
        return response()->json([['success' => true, 'data' => $offers]]);
    }); //special offers

    Route::get('/chambers/{id}', function ($id) {
        $chambers = Chamber::join('chamber_details', 'chamber_details.chamber_id', '=', 'chambers.id')
            ->where('chamber_details.astrologer_id', $id)->get();
        return response()->json([['success' => true, 'data' => $chambers]]);
    }); //chambers

    Route::get('/certificate/all/{id}', [CertificateController::class, 'getCertificate']);
});

Route::group(['middleware' => 'auth'], function () {

    Route::post('/changepassword', [AstroController::class, 'changePassword']);
});
