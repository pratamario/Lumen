<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\CustomerController;

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
    return 'Ini halaman Customer';
});

$router->get('/customer', ['uses' => 'CustomerController@index']);
$router->post('/customer/insert', ['uses' => 'CustomerController@insert']);
$router->put('/customer/update/{id}', ['uses' => 'CustomerController@update']);
$router->delete('/customer/delete/{id}', ['uses' => 'CustomerController@delete']);
