<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\VpnConttroller;
use App\Http\Controllers\VpnMangerController;

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

Route::get('/install', function () { return view('install.index'); });

Route::prefix('install')->group(function () {
    Route::get('/check-requirements', [InstallController::class, 'checkRequirements'])->name('install.check-requirements');
    Route::get('/environmentsetup', [InstallController::class, 'environmentSetup'])->name('install.environment-setup');
    Route::post('/edit-env', [InstallController::class, 'changeEnvData']);
    Route::get('/finish', [InstallController::class, 'finishInstall'])->name('install.finishInstall');
});


Route::middleware('web', 'check.installation')->group(function () {
        Route::get('/', function () { return view('auth.login'); });
        Route::get('/login', function () { return view('auth.login'); });
        Route::post('/auth/login', [AuthController::class, 'loginUser']);
                Route::middleware(['auth.user'])->group(function () {
                    Route::get('/dashboard', function () { return view('app.dashboard'); });
                    Route::get('/addppptp', function() { return view('app.addppptp'); });

                    Route::post('/pptpclientadd', [VpnMangerController::class, 'addPPTP']);
                    Route::get('/pptpclientlist', [VpnMangerController::class, 'showPPTP']);

                    Route::get('/vpn', [VpnConttroller::class, 'showVPN'])->name('app.vpn');
                    Route::post('install-pptp', [VpnConttroller::class, 'installPPTP']);
                    Route::post('install-l2tp', [VpnConttroller::class, 'installL2TP']);
                    Route::post('install-openvpn', [VpnConttroller::class, 'installOpenVPN']);
                    Route::post('install-sstp', [VpnConttroller::class, 'installSSTP']);

                    Route::get('/role/add', function () { return view('auth.addrole'); });
                    Route::get('/role/list', [AuthController::class, 'showRoles'])->name('roles.showRoles');
                    Route::get('/role/edit/{id}', [AuthController::class, 'editRole'])->name('roles.editRole');
                    Route::get('/role/delete/{id}', [AuthController::class, 'deleteRole'])->name('roles.deleteRole');

                    Route::get('/user/add', [AuthController::class, 'addViewUser'])->name('users.addViewUser');
                    Route::get('/user/list', [AuthController::class, 'showUsers'])->name('users.showUsers');
                    Route::get('/user/edit/{id}', [AuthController::class, 'editUser'])->name('users.editUser');
                    Route::get('/user/delete/{id}', [AuthController::class, 'deleteUser'])->name('users.deleteUser');


                    Route::get('/auth/logout', [AuthController::class, 'logoutUser']);
                    Route::post('/roleadd', [AuthController::class, 'addRole']);
                    Route::post('/roleedit', [AuthController::class, 'editUserRole']);
                    Route::post('/useradd', [AuthController::class, 'addUser']);
                    Route::post('/useredit', [AuthController::class, 'editUserDetails']);
                });
});
