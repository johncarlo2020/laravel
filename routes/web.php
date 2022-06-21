<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\coordinator;
use App\Http\Controllers\address;
use App\Mail\WelcomeMail;
use App\Mail\rejectMail;
use Illuminate\Support\Facades\Mail;


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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['App\Http\Middleware\staff']], function() {
    Route::get('staff/home', [HomeController::class, 'staffHome'])->name('staff.home');
});

Route::group(['middleware' => ['App\Http\Middleware\applicant']], function() {
    Route::get('scholar/success', 'App\Http\Controllers\scholar@index')->name('success');
    Route::get('scholar/verify', 'App\Http\Controllers\scholar@verify')->name('verify');
    Route::get('scholar/withfiles', 'App\Http\Controllers\scholar@withfiles')->name('withfiles');
    Route::get('applicant/home', [HomeController::class, 'applicantHome'])->name('applicant.home');
});

Route::group(['middleware' => ['App\Http\Middleware\examiner']], function() {
    Route::get('scholar/withfiless', 'App\Http\Controllers\scholar@withfiles')->name('withfiless');
});

Route::group(['middleware' => ['App\Http\Middleware\scholar']], function() {
    Route::get('scholar/withfilesss', 'App\Http\Controllers\scholar@withfiles')->name('withfilesss');
    Route::get('scholar/scholarhome', 'App\Http\Controllers\scholar@scholarhome')->name('scholarhome');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/filez', [HomeController::class, 'filesz'])->name('filesz');
    Route::post('scholar/requirements', 'App\Http\Controllers\scholar@store');

});

Route::group(['middleware' => ['App\Http\Middleware\coordinator']], function() {
    Route::get('/coordinator/declined', 'App\Http\Controllers\coordinator@index')->name('coordinator.declined');
    Route::get('/coordinator/scholars', 'App\Http\Controllers\coordinator@scholars')->name('coordinator.scholars');
    Route::get('/coordinator/examiners', 'App\Http\Controllers\coordinator@examiners')->name('coordinator.examiners');
    Route::post('/coordinator/delete', 'App\Http\Controllers\coordinator@delete')->name('coordinator.delete');
    Route::post('/coordinator/deletes', 'App\Http\Controllers\coordinator@deletes')->name('coordinator.deletes');
    Route::get('/coordinator/accept/{id}', 'App\Http\Controllers\coordinator@accepted')->name('coordinator.accepted');
    Route::get('/coordinator/accepting/{id}', 'App\Http\Controllers\coordinator@accepting')->name('coordinator.accepting');
    Route::get('/coordinator/reject/{id}', 'App\Http\Controllers\coordinator@rejected')->name('coordinator.rejected');
    Route::post('/coordinator/exam/accept/{id}', 'App\Http\Controllers\coordinator@examaccepted')->name('exam.accepted');
    Route::get('/coordinator/exam/reject/{id}', 'App\Http\Controllers\coordinator@examrejected')->name('exam.rejected');
    Route::get('coordinator/applicant', 'App\Http\Controllers\coordinator@applicant');
    Route::get('coordinator/home', [HomeController::class, 'coordinatorHome'])->name('coordinator.home');
});


Route::get('applicant/examiner', [HomeController::class, 'examiner'])->name('applicant.examiner');
Route::get('applicant/declined', [HomeController::class, 'declined'])->name('applicant.declined');


//register
Route::get('register/province', [address::class, 'province']);
Route::get('register/municipality', [address::class, 'municipality']);
Route::get('register/brgy', [address::class, 'brgy']);

Route::get('/email', function(){
    Mail::to('johncarlocasipit@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

//welcome
Route::get('exams/schedule', [coordinator::class, 'examdate']);

















