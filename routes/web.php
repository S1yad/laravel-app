<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::resource('users', UserController::class);
Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('users');
Route::get('/users/create', [UserController::class, 'create'])
    ->middleware(['auth']);
Route::get('/users/{id}', [UserController::class, 'show'])
    ->middleware(['auth']);
Route::post('/users', [UserController::class, 'store'])
    ->middleware(['auth']);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->middleware(['auth']);
Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth']);
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth']);


require __DIR__.'/auth.php';