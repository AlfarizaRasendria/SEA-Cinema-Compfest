<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WithdrawalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------b-----------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Middleware Guest
Route::middleware('guest')->group(function () {
    // Landing
    Route::get('/', [SessionController::class, 'getLanding'])->name('getLanding');

    // Get Authentication Page
    Route::get('/get/login', [SessionController::class, 'getLogin'])->name('getLogin');
    Route::get('/get/register', [SessionController::class, 'getRegist'])->name('getRegister');

    // Authentication
    Route::post('/login', [UserController::class, 'login'])->name('Login');
    Route::post('/register', [UserController::class, 'register'])->name('Register');

    // Movie
    Route::get('/all/movie', [MovieController::class, 'getAllMovie'])->name('getAllMovie');

    //  Movie Detail
    Route::get('/movie/{id}', [MovieController::class, 'getDetailMovie'])->name('getDetailMovie');
});

Route::middleware('auth')->group(function () {
    Route::get('/home',[SessionController::class,'HomeAuth'])->name('getHomeAuth');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('Logout');
    Route::get('/user/dashboard', [DashboardController::class, 'getDashboard'])->name('getDashboard');
    Route::get('/user/order/{id}', [OrderController::class, 'getOrder'])->name('getOrder');
    Route::get('/user/orderHist', [OrderController::class, 'getOrderHist'])->name('getOrderHist');
    Route::get('/user/all/movie', [OrderController::class, 'getAllMovie'])->name('UserAllMovies');
    Route::get('/user/movie/{id}', [OrderController::class, 'getDetailMovie'])->name('UserDetailMovies');

    Route::get('/user/topUp', [TopUpController::class, 'getTopUp'])->name('getUserTopUp');
    Route::post('/user/add/topUp', [TopUpController::class, 'addTopUp'])->name('addUserTopUp');
    Route::get('/user/Withdrawal', [WithdrawalController::class, 'getWithdraw'])->name('getUserWithdrawal');
    Route::post('/user/add/Withdrawal', [WithdrawalController::class, 'addWithdrawal'])->name('addUserWithdrawal');
    Route::get('/user/balance/{id}', [BalanceController::class, 'getBalance'])->name('getUserBalance');

    Route::get('/user/seat-selection', [OrderController::class, 'showSeatSelection'])->name('show.seat.selection');
    Route::post('/user/process/order/{id}', [OrderController::class, 'processOrder'])->name('process.order');
    Route::get('/user/get/detail/successfullorder/{id}', [OrderController::class, 'getDetailSuccessfullOrder'])->name('getDetailSuccessfullOrder');
    Route::get('/user/cancel/ticket/{id}', [OrderController::class, 'cancelTicket'])->name('cancelTicket');
    Route::get('/user/get/detail/order/{id}', [OrderController::class, 'getDetailOrder'])->name('getDetailOrder');
    Route::get('/user/process/payment/{id}/{selectedSeats}', [PaymentController::class, 'getPayment'])->name('getPayment');
    Route::get('/user/cancel/order/{id}', [OrderController::class,'cancelOrder'])->name('cancelOrder');
    Route::get('/user/order/topUp/{id}/{selectedSeats}', [PaymentController::class,'getOrderTopup'])->name('getOrderTopup');
    Route::post('/user/order/process/topUp/{id}/{selectedSeats}', [PaymentController::class,'proceedOrderTopup'])->name('proceedOrderTopup');
});
