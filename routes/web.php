<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function (){
    Route::get('/user/profile/edit',[UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile/update',[UserProfileController::class, 'update'])->name('user.profile.update');

    //Leave Management
    Route::get('/user/getLeaveType',[LeaveController::class, 'getLeaveType']);
    Route::get('/user/hod',[LeaveController::class, 'gethod']);
    Route::get('/user/leave-application',[LeaveController::class, 'leaveApplication'])->name('leave.application');
    Route::post('/user/leave-store',[LeaveController::class, 'leaveStore']);
    Route::get('/user/appList',[LeaveController::class, 'appList']);
});
