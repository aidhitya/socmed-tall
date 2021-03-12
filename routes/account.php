<?php

use App\Http\Controllers\TimelineController;
use App\Http\Livewire\Account\Edit as editProfile;
use App\Http\Livewire\Account\Show as showProfile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('timeline', TimelineController::class)->name('timeline');
        Route::get('settings', editProfile::class)->name('setting.edit');
    });
    Route::get('{identifier}', showProfile::class)->name('account.profile');
});