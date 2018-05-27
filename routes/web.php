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

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->get('/key', function(){
  return str_random(32);
});

$app->get('/sala','SalaController@list');
$app->post('/boards','BoardController@store');
$app->get('/boards/{board}','BoardController@show');
$app->put('/boards/{boards}','BoardController@update');
$app->delete('/boards/{boards}','BoardController@destroy');


$app->get('/usuario','usuarioController@index');
$app->post('/usuario','usuarioController@CreateUsuario');
$app->post('/usuario/Login','usuarioController@Login');

$app->post('/Mesa','MesasController@ListarMsa');