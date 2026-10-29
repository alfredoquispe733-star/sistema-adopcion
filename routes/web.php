<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\HistorialVacunaController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\SeguimientoAdopcionController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UserController;
use App\Models\Mascota;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $mascotas = Mascota::latest()->get();

    return view('welcome', compact('mascotas'));
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('mascotas.index');
    })->name('dashboard');
    Route::resource('users', UserController::class)->parameters(['users' => 'user']);
    Route::resource('solicitantes', SolicitanteController::class)->parameters(['solicitantes' => 'solicitante']);
    Route::resource('doctores', DoctorController::class)->parameters(['doctores' => 'doctor']);
    Route::resource('mascotas', MascotaController::class)->parameters(['mascotas' => 'mascota']);
    Route::resource('stock', StockController::class)->parameters(['stock' => 'stock']);
    Route::resource('tratamientos', TratamientoController::class)->parameters(['tratamientos' => 'tratamiento']);
    Route::resource('solicitudes', SolicitudController::class)->parameters(['solicitudes' => 'solicitud']);
    Route::resource('historial_vacunas', HistorialVacunaController::class)->parameters(['historial_vacunas' => 'historial_vacuna']);
    Route::resource('seguimientos_adopcion', SeguimientoAdopcionController::class)->parameters(['seguimientos_adopcion' => 'seguimiento_adopcion']);
    Route::resource('donaciones', DonacionController::class)->parameters(['donaciones' => 'donacion']);

});
