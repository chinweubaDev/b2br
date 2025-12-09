<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CruiseController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Admin\AdminAuthController;

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

// Admin Authentication Routes (Separate from user auth)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Forgot/Reset Password
Route::get('/password/forgot', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Create test user route (remove in production)
Route::get('/create-user', [AuthController::class, 'createUser']);

Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::patch('/users/{user}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('users.toggle-status');
    
    // Fund user wallet
    Route::get('/users/{user}/fund', [AdminController::class, 'showFundUser'])->name('users.fund');
    Route::post('/users/{user}/fund', [AdminController::class, 'fundUser']);
    
    // Send mail to user
    Route::get('/users/{user}/mail', [AdminController::class, 'showMailUser'])->name('users.mail');
    Route::post('/users/{user}/mail', [AdminController::class, 'mailUser']);
    
    // All Services
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    
    // All Payments
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    
    // All Wallet Transactions
    Route::get('/wallet-transactions', [AdminController::class, 'walletTransactions'])->name('wallet-transactions');
    
    // Send mail to all users
    Route::get('/send-mail', [AdminController::class, 'showMailAll'])->name('mail.all');
    Route::post('/send-mail', [AdminController::class, 'mailAll'])->name('mail.sendAll');
    
    // System Management
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::get('/logs', [AdminController::class, 'logs'])->name('logs');
    Route::get('/backups', [AdminController::class, 'backups'])->name('backups');
    Route::post('/backups', [AdminController::class, 'createBackup'])->name('backups.create');
    Route::get('/health', [AdminController::class, 'health'])->name('health');
});

// Visa Services (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('visas', VisaController::class);
    Route::get('/visas', [VisaController::class, 'adminindex'])->name('visas.index');
    Route::get('/visas/{visa}/edit', [VisaController::class, 'edit'])->name('visas.edit');
    Route::put('/visas/{visa}', [VisaController::class, 'update'])->name('visas.update');
    Route::delete('/visas/{visa}', [VisaController::class, 'destroy'])->name('visas.destroy');
    Route::get('/visas/create', [VisaController::class, 'create'])->name('visas.create');
    Route::get('/visas/{visa}/requirements', [VisaController::class, 'requirements'])->name('visas.requirements');
    Route::delete('/visas/{visa}/images/{image}', [VisaController::class, 'deleteImage'])->name('visas.delete-image');
});

// Tour Packages (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tours', TourController::class);
    Route::get('/tours', [TourController::class, 'adminLink'])->name('tours.index');
    Route::delete('/tours/{tour}/images/{image}', [TourController::class, 'deleteImage'])->name('tours.delete-image');
});

// Hotels (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('hotels', HotelController::class);
    Route::get('/hotels', [HotelController::class, 'adminIndex'])->name('hotels.index');
    Route::get('/hotels/{hotel}/amenities', [HotelController::class, 'amenities'])->name('hotels.amenities');
    Route::delete('/hotels/{hotel}/images/{image}', [HotelController::class, 'deleteImage'])->name('hotels.delete-image');
});

// Cruises (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cruises', CruiseController::class);
    Route::get('/cruises', [CruiseController::class, 'adminIndex'])->name('cruises.index');
    Route::get('/cruises/{cruise}/itinerary', [CruiseController::class, 'itinerary'])->name('cruises.itinerary');
    Route::delete('/cruises/{cruise}/images/{image}', [CruiseController::class, 'deleteImage'])->name('cruises.delete-image');
});

// Documentation Services (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('documentation', DocumentationController::class);
    Route::get('/documentation', [DocumentationController::class, 'adminIndex'])->name('documentation.index');
    Route::get('/documentation/{service}/requirements', [DocumentationController::class, 'requirements'])->name('documentation.requirements');
});

// Bookings (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::get('/bookings/pending', [AdminController::class, 'pendingBookings'])->name('bookings.pending');
    Route::get('/bookings/confirmed', [AdminController::class, 'confirmedBookings'])->name('bookings.confirmed');
    Route::post('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');
    Route::get('/bookings/{booking}/invoice', [BookingController::class, 'invoice'])->name('bookings.invoice');
    Route::get('/bookings/statistics', [BookingController::class, 'statistics'])->name('bookings.statistics');
    Route::get('/bookings/export', [BookingController::class, 'export'])->name('bookings.export');
});

// Partners (Admin-protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('partners', PartnerController::class);
    Route::get('/partners', [PartnerController::class, 'adminIndex'])->name('partners.index');
    Route::get('/partners/pending', [AdminController::class, 'pendingPartners'])->name('partners.pending');
    Route::get('/partners/{partner}/dashboard', [PartnerController::class, 'dashboard'])->name('partners.dashboard');
    Route::patch('/partners/{partner}/status', [PartnerController::class, 'updateStatus'])->name('partners.status');
    Route::post('/partners/{partner}/payment', [PartnerController::class, 'processPayment'])->name('partners.payment');
});

// Payment Routes
Route::middleware(['auth'])->prefix('payment')->name('payment.')->group(function () {
    // Payment options for different services
    Route::get('/{serviceType}/{serviceId}', [PaymentController::class, 'showOptions'])->name('options');
    
    // Bank transfer payment
    Route::post('/{serviceType}/{serviceId}/bank-transfer', [PaymentController::class, 'bankTransfer'])->name('bank-transfer');
    Route::get('/{serviceType}/{serviceId}/bank-transfer', [PaymentController::class, 'showBankTransfer'])->name('bank-transfer.show');
    
    // Paystack payment
    Route::post('/{serviceType}/{serviceId}/paystack', [PaymentController::class, 'paystack'])->name('paystack');
    Route::get('/{serviceType}/{serviceId}/paystack', [PaymentController::class, 'showPaystack'])->name('paystack.show');
    
    // Payment callbacks
    Route::get('/paystack/callback', [PaymentController::class, 'paystackCallback'])->name('paystack.callback');
    
    // Payment results
    Route::get('/success/{payment}', [PaymentController::class, 'success'])->name('success');
    Route::get('/failed/{payment}', [PaymentController::class, 'failed'])->name('failed');
    
    // Transaction history
    Route::get('/history', [PaymentController::class, 'history'])->name('history');
    Route::get('/details/{payment}', [PaymentController::class, 'details'])->name('details');

    // Wallet payment
    Route::post('/{serviceType}/{serviceId}/wallet', [PaymentController::class, 'walletPay'])->name('wallet');
});
 Route::resource('tours', TourController::class);
    Route::get('/tours/{tour}/itinerary', [TourController::class, 'itinerary'])->name('tours.itinerary');
    Route::delete('/tours/{tour}/images/{image}', [TourController::class, 'deleteImage'])->name('tours.delete-image');
    Route::resource('visas', VisaController::class);
    Route::get('/visas/{visa}/requirements', [VisaController::class, 'requirements'])->name('visas.requirements');
    Route::delete('/visas/{visa}/images/{image}', [VisaController::class, 'deleteImage'])->name('visas.delete-image');
     
       Route::resource('hotels', HotelController::class);
    Route::get('/hotels/{hotel}/amenities', [HotelController::class, 'amenities'])->name('hotels.amenities');
    Route::resource('cruises', CruiseController::class);
    Route::get('/cruises/{cruise}/itinerary', [CruiseController::class, 'itinerary'])->name('cruises.itinerary');
    Route::resource('documentation', DocumentationController::class);
    Route::get('/documentation/{service}/requirements', [DocumentationController::class, 'requirements'])->name('documentation.requirements');
// Wallet Funding
Route::middleware(['auth'])->prefix('wallet')->name('wallet.')->group(function () {
    Route::get('/fund', [WalletController::class, 'showFundForm'])->name('fund');
    Route::post('/fund', [WalletController::class, 'initiateFund'])->name('fund.initiate');
    Route::get('/callback', [WalletController::class, 'paystackCallback'])->name('callback');
});

// API Routes for AJAX requests
Route::prefix('api')->group(function () {
    Route::get('/countries', function () {
        return App\Models\Country::all();
    });
    
    Route::get('/visa-services/{country}', function ($country) {
        return App\Models\VisaService::where('country_id', $country)->get();
    });
    
    Route::get('/hotels/{city}', function ($city) {
        return App\Models\Hotel::where('city', $city)->get();
    });
});

// Authentication routes (if using Laravel Breeze/Jetstream)
// Route::middleware('auth')->group(function () {
//     // Protected routes here
// });

Route::middleware(['auth'])->get('/payments/history', [PaymentController::class, 'history'])->name('payments.history');
