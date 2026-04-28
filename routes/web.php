<?php
 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MikrotikSettingController;

use App\Http\Controllers\Admin\Cms\PostController;
use App\Http\Controllers\Admin\Cms\ActivityController;
use App\Http\Controllers\Admin\Cms\ServiceAreaController;
use App\Http\Controllers\Admin\Cms\LeadController;

use App\Models\Post;
use App\Models\Activity;
use App\Models\ServiceArea;

Route::get('/', function () {
    return view('landing', [
        'posts' => \App\Models\Post::where('status', 'published')->latest()->take(3)->get(),
        'activities' => \App\Models\Activity::latest()->take(6)->get(),
        'service_areas' => \App\Models\ServiceArea::all()
    ]);
});

Route::get('/produk', function () {
    return view('products');
});

Route::get('/speed-test', function () {
    return view('speed-test');
})->name('speed-test');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/aktivitas', function () {
    return view('activities');
})->name('activities');

Route::post('/request-coverage', [LeadController::class, 'storePublic'])->name('request-coverage');

Route::post('/speed-test/upload', function () {
    return response()->json(['status' => 'ok']);
})->name('speed-test.upload');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('packages', PackageController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::post('invoices/generate-batch', [InvoiceController::class, 'generateBatch'])->name('invoices.generate-batch');
    Route::post('invoices/{invoice}/mark-as-paid', [InvoiceController::class, 'markAsPaid'])->name('invoices.mark-as-paid');

    Route::get('/tagihan', fn() => redirect()->route('admin.invoices.index'))->name('tagihan');
    Route::get('/paket-internet', fn() => redirect()->route('admin.packages.index'))->name('paket-internet');
    Route::get('/user-management', [DashboardController::class, 'index'])->name('admin.user-management');
    Route::get('/mikrotik-api', [MikrotikSettingController::class, 'index'])->name('mikrotik-api');
    Route::post('/mikrotik-api', [MikrotikSettingController::class, 'store'])->name('mikrotik-api.store');
    Route::post('/mikrotik-api/test/{setting}', [MikrotikSettingController::class, 'testConnection'])->name('mikrotik-api.test');

    // CMS & Web Content
    Route::resource('posts', PostController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('service-areas', ServiceAreaController::class);
    Route::resource('leads', LeadController::class);
});
