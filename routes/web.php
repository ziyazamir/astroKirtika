<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\featuredController;
use App\Http\Controllers\membershipController;
use App\Http\Controllers\RatingController;
use App\Models\Banner;
use App\Models\Place;
use App\Models\Astrologer;
use App\Models\Chamber;
use App\Models\TopAstrologerSelections;
use App\Notifications\AstrologerNotification;
use App\Models\Notification;
use App\Http\Controllers\UserController;
use App\Models\offers;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('admin/login', [AdminController::class, 'login']);
Route::get('admin/login', function () {
    if (Auth::user()) {
        return redirect()->back();
    }
    return view('auth.login');
})->name('login');
Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->back();
    }
    return view('auth.login');
});
Route::get('/logout', function () {
    Auth::guard('web')->logout();
    return redirect()->route('login');
})->middleware('auth')->name('logout');
Route::group(['middleware' => 'auth'], function ()
// Route::group(['middleware' => ['role:Admin']], function () 
{
    Route::get('/chamber', function () {
        $chambers = Chamber::latest()->paginate(3);
        return view('admin.chamber', compact('chambers'));
    })->name('chamber')->middleware('auth');

    // Auth::routes();
    Route::get('/notification', function () {
        // $astrologers=Astrologer::latest()->get();
        $notifications = Notification::latest()->paginate(10);
        return view('admin.notification', compact('notifications'));
    })->name('notification');

    Route::get('/offers', function () {
        // $astrologers=Astrologer::latest()->get();
        $topAstrologerSelections = offers::join('users', 'users.id', '=', 'special_offers.astrologer_id')->get();
        // return $topAstrologerSelections->all();

        return view('admin.topastro', compact('topAstrologerSelections'));
    })->name('topastro');


    Route::get('/banner', function () {
        $banners = Banner::latest()->paginate(3);
        return view('admin.banner', compact('banners'));
    })->name('banner');

    Route::get('/place', function () {
        $places = Place::latest()->paginate(3);
        return view('admin.place', compact('places'));
    })->name('place');

    Route::get('/place/create', function () {
        return view('admin.add.addplace');
    })->name('place.create');

    Route::get('/banner/create', function () {
        return view('admin.add.addbanner');
    })->name('banner.create');

    Route::get('/chamber/create', function () {
        return view('admin.add.addchamber');
    })->name('chamber.create');

    Route::get('/offers/create', function () {
        $astrologers = User::where('role', 'astrologer')->get();
        return view('admin.add.addtopastro', compact('astrologers'));
    })->name('astrologer.create');


    Route::get('/notification/create', function () {
        $astrologers = Astrologer::latest()->get();
        return view('admin.add.addnotification', compact('astrologers'));
    })->name('notifivation.create');

    Route::get('/membership/create', function () {
        // $astrologers = Astrologer::latest()->get();
        return view('pages.membership.create');
    })->name('membership.create');


    // Auth::routes();
    Route::get('/check', [App\Http\Controllers\HomeController::class, 'index3']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/astrologer', [App\Http\Controllers\HomeController::class, 'index2'])->name('astrologer');
    Route::get('/astrologer/details/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('astrologer.details');
    Route::get('/astrologer/{task}/{id}', [App\Http\Controllers\HomeController::class, 'approve'])->name('astrologer.details'); //approve
    // Route::get('/astrologer/disapprove/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('astrologer.details');//disapprove
    Route::get('/membership', [App\Http\Controllers\membershipController::class, 'index'])->name('membership.all');
    Route::post('/membership/store', [App\Http\Controllers\membershipController::class, 'store'])->name('membership.store');
    Route::post('/user/store', [AdminController::class, 'userStore'])->name('users.store');
    Route::post('/astrologers/store', [AdminController::class, 'astrologersStore'])->name('astrologers.store');
    Route::post('/banners/store', [AdminController::class, 'bannersStore'])->name('banners.store');
    Route::post('/place/store', [AdminController::class, 'placeStore'])->name('place.store');
    Route::post('/chamber/store', [AdminController::class, 'chamberStore'])->name('chamber.store');
    Route::post('/featured/astro/store', [featuredController::class, 'store'])->name('featured.store');


    //Delete Route
    Route::get('/banner/delete/{id}', [AdminController::class, 'bannerDelete']);
    Route::get('/place/delete/{id}', [AdminController::class, 'placeDelete']);
    Route::get('/chamber/delete/{id}', [AdminController::class, 'chamberDelete']);
    Route::get('/topastro/delete/{id}', [AdminController::class, 'topastroDelete']);
    Route::get('/notification/delete/{id}', [AdminController::class, 'notificationDelete']);
    Route::get('/membership/delete/{id}', [membershipController::class, 'delete']);
    Route::get('/astrologer/featured/delete/{id}', [featuredController::class, 'delete']);

    //Edit Route
    Route::get('/banner/edit/{id}', [AdminController::class, 'bannerEdit']);
    Route::get('/place/edit/{id}', [AdminController::class, 'placeEdit']);
    Route::get('/chamber/edit/{id}', [AdminController::class, 'chamberEdit']);
    Route::get('/topastro/edit/{id}', [AdminController::class, 'topAstroEdit']);
    Route::get('/membership/edit/{id}', [membershipController::class, 'edit']);
    Route::get('/ratings', [RatingController::class, 'index']);
    Route::get('/featuredAstrologer', [featuredController::class, 'index']);

    //Update Route
    Route::post('/banner/update/{id}', [AdminController::class, 'bannerUpdate']);
    Route::post('/place/update/{id}', [AdminController::class, 'placeUpdate']);
    Route::post('/chamber/update/{id}', [AdminController::class, 'chamberUpdate']);
    Route::post('/topastro/update/{id}', [AdminController::class, 'topastroUpdate']);
    Route::post('/membership/update', [membershipController::class, 'update'])->name('membership.update');

    //update status
    Route::post('/update-status', [AdminController::class, 'updateStatus'])->name('update.status');
    Route::post('/update-status-astro', [AdminController::class, 'updateStatusAstro'])->name('update.status.astro');

    //send  notification
    Route::post('/send/notification', [AdminController::class, 'sendNotification'])->name('admin.sendNotification');

    //top Astro
    Route::post('/top-astrologers/store', [AdminController::class, 'saveTopAstrologers'])->name('admin.offers.store');
});
