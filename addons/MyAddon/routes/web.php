<?php

use Illuminate\Support\Facades\Route;
use Addons\MyAddon\Controllers\MyAddonController;

Route::get('/myaddon', [MyAddonController::class, 'index']);
