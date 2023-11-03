<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\BusinessController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('business/store', 'BusinessController@storeBusiness');
$router->put('business/update', 'BusinessController@updateBusiness');
$router->delete('business/delete', 'BusinessController@destroyBusiness');
$router->get('business/search', 'BusinessController@searchBusiness');

