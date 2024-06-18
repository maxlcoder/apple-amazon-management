<?php

use App\Admin\Controllers\SpiderProductController;
use App\Admin\Controllers\AppleGiftCardController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('spider-product', SpiderProductController::class);
    $router->resource('apple-gift-cards', AppleGiftCardController::class);

});
