<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'el'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    app()->setLocale($locale);

    return redirect()->back();
})->name('locale.switch');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});

require __DIR__.'/auth.php';
