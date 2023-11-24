<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserRoleController;
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
Route::get('/blogs/{category}', [SiteController::class, 'getBlogListPageByCategoy'])->name('page.bloglistByCategory');
Route::get('/blog/details/{id}', [SiteController::class, 'getblogDetails'])->name('page.blogDetails');
// SiteController Work End


//AdminController Work Start
Route::middleware('auth')->group(function () {
    Route::get('/user-list', [AdminController::class, 'getUserList'])->name('page.userList');
    Route::get('/user-list', [AdminController::class, 'getUserList'])->name('page.userList');
    Route::get('/own-posts', [AdminController::class, 'getOwnPostsList'])->name('page.ownPosts');
    Route::get('/all-posts', [AdminController::class, 'getAllPostsList'])->name('page.allPosts');
    Route::get('/add-posts', [AdminController::class, 'getAddPostPage'])->name('page.addPost');
});
//AdminController Work End




//UserRoleControlelr Work Start
Route::middleware('auth')->group(function () {
    Route::get('/update-user-role/{id}', [UserRoleController::class, 'getUserRolePage'])->name('page.userRoleController');

    Route::post('/update-role', [UserRoleController::class, 'updateRole'])->name('updateRole');
});
//UserRoleControlelr Work End



//PostController work Start
Route::middleware('auth')->group(function () {
    Route::post('/store-post', [PostController::class, 'storePost'])->name('storePost');
});
//PostController work End


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
