<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tournment_CategoryController;
use App\Http\Controllers\TournmentCategoryController;
use App\Models\TournmentCategory;
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

Route::middleware('auth')->group(function () {
    Route::get('/categorydashboard',[TournmentCategoryController::class,'show'])->name('categorydashboard.show');
    Route::get('/addcategoryform',[TournmentCategoryController::class,'addcategoryform'])->name('categorydashboard.addcategoryform');
    Route::post('/addcategory',[TournmentCategoryController::class,'addcategory'])->name('categorydashboard.addcategory');
    Route::get('/categoryupdate/{id}',[TournmentCategoryController::class,'showupdate'])->name('category.showupdate');
    Route::put('/updatecategory/{id}',[TournmentCategoryController::class,'update'])->name('category.update');
    Route::get('/confirmdelete/{id}',[TournmentCategoryController::class,'confirmdelete'])->name('category.confirmdelete');
    Route::delete('/deletecategory/{id}',[TournmentCategoryController::class,'delete'])->name('category.deletecategory');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
