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
    $router->get('travel', 'TravelController@index');
    // $router->get('travel/{id}', 'TravelController@show');
    // $router->post('travel', 'TravelController@save');
    // $router->put('travel/{id}', 'TravelController@update');
    // $router->delete('travel/{id}', 'TravelController@delete');
});