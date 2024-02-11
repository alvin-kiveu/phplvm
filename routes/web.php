<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PorcessorController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () { return view('auth.login'); });
Route::get('/login', function () { return view('auth.login'); });



Route::middleware(['auth.user'])->group(function () {
    Route::get('/dashboard', function () { return view('app.dashboard'); });

    Route::get('/role/add', function () { return view('auth.addrole'); });
    Route::get('/role/list', [AuthController::class, 'showRoles'])->name('roles.showRoles');
    Route::get('/role/edit/{id}', [AuthController::class, 'editRole'])->name('roles.editRole');
    Route::get('/role/delete/{id}', [AuthController::class, 'deleteRole'])->name('roles.deleteRole');

    Route::get('/user/add', [AuthController::class, 'addViewUser'])->name('users.addViewUser');
    Route::get('/user/list', [AuthController::class, 'showUsers'])->name('users.showUsers');
    Route::get('/user/edit/{id}', [AuthController::class, 'editUser'])->name('users.editUser');
    Route::get('/user/delete/{id}', [AuthController::class, 'deleteUser'])->name('users.deleteUser');


});

Route::get('/stkpush', [PorcessorController::class, 'stkPush']);
Route::get('/stkpush/query', [PorcessorController::class, 'queryStkPush']);


Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::get('/auth/logout', [AuthController::class, 'logoutUser']);
Route::post('/roleadd', [AuthController::class, 'addRole']);
Route::post('/roleedit', [AuthController::class, 'editUserRole']);
Route::post('/useradd', [AuthController::class, 'addUser']);
Route::post('/useredit', [AuthController::class, 'editUserDetails']);

