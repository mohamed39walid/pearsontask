<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\Tournment_CategoryController;
use App\Http\Controllers\TournmentCategoryController;
use App\Http\Controllers\TournmentController;
use App\Http\Controllers\UserController;
use App\Models\Tournment;
use App\Models\TournmentCategory;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [TournmentController::class, 'showuserpage']);
    Route::controller(TournmentCategoryController::class)->group(function () {
        Route::get('/categorydashboard', 'show')->name('categorydashboard.show');
        Route::get('/addcategoryform', 'addcategoryform')->name('categorydashboard.addcategoryform');
        Route::post('/addcategory', 'addcategory')->name('categorydashboard.addcategory');
        Route::get('/categoryupdate/{id}', 'showupdate')->name('category.showupdate');
        Route::put('/updatecategory/{id}', 'update')->name('category.update');
        Route::get('/confirmdelete/{id}', 'confirmdelete')->name('category.confirmdelete');
        Route::delete('/deletecategory/{id}', 'delete')->name('category.deletecategory');
    });
    Route::controller(TournmentController::class)->group(function () {
        Route::get('/tournmentdashboard', 'showtournments')->name('tournment.showtournments');
        Route::get('/addtournment', 'showaddform')->name('tournment.showaddform');
        Route::post('/addtournment', 'addtournment');
        Route::get('/tournmentupdate/{id}', 'showupdateform');
        Route::put('/updatetournment/{id}', 'updatetournment');
        Route::get('/tournmentdelete/{id}', 'showconfirmdelete');
        Route::delete('/deletetournment/{id}', 'deletetournment');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/userdashboard', 'getusers')->name('user.getusers');
        Route::get('/adduserform', 'showaddingform')->name('user.showaddingform');
        Route::post('/adduser', 'addingusers')->name('user.addingusers');
        Route::get('/updateuserform/{id}', 'showupdateform')->name('user.showupdateform');
        Route::put('/updateuser/{id}', 'updateuserdata')->name('user.updateuserdata');
        Route::get('/confirmdeleteuser/{id}', 'confirmdelete')->name('user.confirmdelete');
        Route::delete('/deleteuser/{id}', 'deleteuser')->name('user.deleteuser');
    });
    Route::controller(EventController::class)->group(function () {
        Route::get('/eventdashboard', 'getdata')->name('event.eventdashboard');
        Route::get('/addevent', 'getaddform');
        Route::post('/addevent', 'addevent');
        Route::get('/updateeventform/{id}', 'showupdateform');
        Route::put('/updateevent/{id}', 'updateevent');
        Route::get('/confirmeventdelete/{id}', 'confirmeventdelete');
        Route::delete('/eventdelete/{id}', 'deleteevent');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    Route::controller(ScoreController::class)->group(function () {
        Route::get('/join_tournment/{id}', 'showsituationform')->name('score.showsituationform');
        Route::match(['get', 'post'], '/tournamentform/{id}', 'showevents')->name('score.showevents');
        Route::match(['get', 'post'], 'tournmentquestions/{id}/{selectvalue}', 'showquestions')->name('score.showquestions');
        Route::get('/yourscore','showuserscore');
    });
    Route::controller(QuestionController::class)->group(function () {
        Route::put('/answerquestions/{id}/{sco_id}/{selectvalue}', 'submitAnswers');
    });
});

require __DIR__ . '/auth.php';
