<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {

});
Route::get('/', function () {
    // Auth::loginUsingId(2);
    return redirect('/login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\EventController::class,'index']);
    Route::resource('Meetings', App\Http\Controllers\MeetingController::class);

    Route::resource('Events', App\Http\Controllers\EventController::class);
    Route::post('Events/RegisterClient', [App\Http\Controllers\EventController::class, 'RegisterClient'])->name('Events.RegisterClient');
    Route::post('Events/UnRegisterClient', [App\Http\Controllers\EventController::class, 'UnRegisterClient'])->name('Events.UnRegisterClient');
    Route::get('Events/getEvents', [App\Http\Controllers\EventController::class, 'getEvents'])->name('Events.getEvents');


    Route::resource('Clients', App\Http\Controllers\ClientController::class);

    Route::resource('Education', App\Http\Controllers\EducationController::class);

    Route::post('Education/setHigh', [App\Http\Controllers\EducationController::class, 'setHigh'])->name('Education.setHigh');
    Route::resource('Employeement', App\Http\Controllers\EmployeementController::class);
    Route::resource('Training', App\Http\Controllers\TrainingController::class);
    Route::resource('Activity', App\Http\Controllers\ActivityController::class);
    Route::resource('Outcome', App\Http\Controllers\OutcomeController::class);
    Route::resource('Document', App\Http\Controllers\DocumentController::class);
});

Route::get('/Calander', function () {

    return view('event.calander');
})->name('Events.calander');

Route::get('calendar', [EventController::class, 'getDates'])->name('calendar.index');
Route::post('calendar/create-event', [EventController::class, 'create'])->name('calendar.create');
Route::patch('calendar/edit-event', [EventController::class, 'edit'])->name('calendar.edit');
Route::delete('calendar/remove-event', [EventController::class, 'destroy'])->name('calendar.destroy');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


