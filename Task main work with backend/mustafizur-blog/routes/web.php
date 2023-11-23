<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// SiteController Work Start
Route::get('/', [SiteController::class, 'getHomePage'])->name('page.home');
Route::get('/blogs', [SiteController::class, 'getBlogListPage'])->name('page.bloglist');
Route::get('/blogs/{tag}', [SiteController::class, 'getBlogListPage'])->name('page.bloglistByTag');
Route::get('/blog/details/{id}', [SiteController::class, 'getblogDetails'])->name('page.blogDetails');
// SiteController Work End


//AdminController Work Start
Route::middleware('auth')->group(function () {
    Route::get('/user-list', [AdminController::class, 'getUserList'])->name('page.userList');
    Route::get('/user-list', [AdminController::class, 'getUserList'])->name('page.userList');
    Route::get('/own-posts', [AdminController::class, 'getOwnPostsList'])->name('page.ownPosts');
    Route::get('/all-posts', [AdminController::class, 'getAllPostsList'])->name('page.allPosts');
});
//AdminController Work End


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
