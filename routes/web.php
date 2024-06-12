<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('login-form', [AdminController::class, 'login_form'])->name('login.form');
Route::post('login-functionality', [AdminController::class, 'login_functionality'])->name('login.functionality');
Route::get('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

//Route::group(['middleware'=>'admin'],function(){
//    Route::get('logout',[AdminController::class,'logout'])->name('logout');
//    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
//});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-list', [DashboardController::class, 'user_list'])->name('user.list');
    Route::get('/admin/user/{id}/edit', [DashboardController::class, 'edit'])->name('user.edit');
    Route::delete('/admin/user/{id}', [DashboardController::class, 'destroy'])->name('user.destroy');
});


Auth::routes();
Auth::routes(['verify' => true]);

//Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//    ->middleware(['auth:'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])
//    ->name('verification.verify');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/flights', [FlightController::class, 'index'])->name('flight.list');

Route::get('/passenger/create', [PassengerController::class, 'create'])->name('passengers.create');
Route::post('/passenger', [PassengerController::class, 'store'])->name('passengers.store');

//Route::get('/forgot-password', function (\Illuminate\Http\Request $request) {
//    return view('auth.passwords.reset');
//})->middleware('guest')->name('password.request');

//Route::get('/reset-password/{token}', function (string $token) {
//    return view('auth.reset-password', ['token' => $token]);
//})->middleware('guest')->name('password.reset');


Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/post-list', [PostController::class, 'index'])->name('post.list');
Route::get('/post-create', [PostController::class, 'create'])->name('post.create');
Route::post('/post-store', [PostController::class, 'store'])->name('post.store');
Route::get('/post-show/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post-edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/posts/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post-delete/{id}', [PostController::class, 'delete'])->name('post.delete');

Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{postId}', [CommentController::class, 'fetchComments'])->name('comments.fetch');
Route::put('/comments/{commentId}', [CommentController::class, 'update'])->name('comments.update');

Route::delete('/comments/{commentId}', [CommentController::class, 'destroy'])->name('comments.destroy');
