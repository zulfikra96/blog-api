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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
$router->get('/',function(){
    
    return ["zulfikra" => "lahmudin"];
});

// authentication
$router->get('/login','AuthController@login');
$router->post('/register','AuthController@register');
