<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\ApartmentSponsorshipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Admin\ViewController;
use App\Models\PaymentController;

// use App\Models\ApartemntSponsorship;

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
    return redirect('/login');
});

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/apartments', [ApartmentController::class, 'index'])->name('apartments.index');
        Route::get('/apartments/archive', [ApartmentController::class, 'archive'])->name('apartments.archive');
        Route::resource('apartments', ApartmentController::class);
        Route::get('/apartments/restore/{id}', [ApartmentController::class, 'restore'])->name('apartments.restore');
        Route::get('/messages/{apartment_id?}', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/sponsorships', [SponsorshipController::class, 'index'])->name('sponsorships.index');
        Route::post('/process-payment', [AdminPaymentController::class, 'processPayment'])->name('process_payment');
        Route::get('/stats', [ViewController::class, 'index'])->name('stats.index');
    });

require __DIR__ . '/auth.php';

Route::get('error404', function () {
    return view('errors.404');
})->name('error404');
