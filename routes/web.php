<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
         $client_id=\Illuminate\Support\Facades\Auth::user()->client->id;
         $myEventsCount = App\Models\Event::whereHas('client', function ($q) use ($client_id){
            $q->where('client_id', $client_id);
        })->count();
        $upcomingmeetingsCount = App\Models\Meeting::where('client_id', $client_id)->count();
        $pastmeetingsCount = App\Models\Meeting::where(['client_id' => $client_id])
            ->where('date', '<', date('Y-m-d'))
            ->count();
    return view('user.index',compact('client_id','myEventsCount','upcomingmeetingsCount','pastmeetingsCount'));
    });
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


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


