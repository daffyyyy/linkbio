<?php

use App\Http\Controllers\User\UserController;
use App\Models\Link;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Auth::routes(['verify' => true]);

Route::view('/', 'index');

// User dashboard stuff
Route::group(['prefix'=> 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [UserController::class,'index'])->name('user.index');
    Route::get('/profile', [UserController::class,'edit'])->name('user.edit');
});

// User page
Route::get('/{user:slug}', [UserController::class,'show'])->name('user.show');

// Link tracker
// TODO: Save more information about click
Route::post('/link-track', function(Request $request) {
    Link::where('id', $request->get(0))->increment('clicks');
})->middleware('throttle:10,1');
