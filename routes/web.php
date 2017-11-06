<?php

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

use Illuminate\Support\Facades\Log;

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'post', 'middleware' => 'auth'], function () use ($router) {

    $router->get('/', ['as' => 'index', 'uses' => 'PostController@index']);
    $router->get('/{id}', ['as' => 'show', 'uses' => 'PostController@show']);
    $router->post('/', ['as' => 'store', 'uses' => 'PostController@store']);

});

$router->group(['prefix' => 'user'], function() use($router){

    $router->post('/', ['as' =>'store', 'uses' => 'UserController@store']);

});


$router->get('/endpoint', function() use($router){
  echo 'eita';
});
