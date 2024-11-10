<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardSiswa;
use App\Livewire\DashboardSiswa as LivewireDashboardSiswa;

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

// Route::get('/dashboard', function () {
//     return view('dashboard.blade.php');  // Menampilkan view dashboard.blade.php
// });
// Route::get('/', LivewireDashboardSiswa::class); 