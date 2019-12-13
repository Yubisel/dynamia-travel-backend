<?php
use Illuminate\Support\Str;

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
    // return $router->app->version();
    return 'DynamiaTravel api service is running... ';
});

//obtener llave
$router->get('/key', function(){
    return Str::random(32);
});

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('travels', 'TravelController@index');
    $router->get('travels/{id}', 'TravelController@show');
    $router->post('travels', 'TravelController@save');
    $router->put('travels/{id}', 'TravelController@update');
    $router->delete('travels/{id}', 'TravelController@delete');
});

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('passengers', 'PassengerController@index');
    $router->get('passengers/{id}', 'PassengerController@show');
    $router->post('passengers', 'PassengerController@save');
    $router->put('passengers/{id}', 'PassengerController@update');
    $router->delete('passengers/{id}', 'PassengerController@delete');
});