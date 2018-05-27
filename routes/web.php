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
use GuzzleHttp\Client;


$app->get('/', function () use ($app) {
    return $app->version();
});




$app->get('/sala','SalaController@list');


$app->get('/usuario','usuarioController@index');
$app->post('/usuario','usuarioController@CreateUsuario');
$app->post('/usuario/Login','usuarioController@Login');

$app->post('/Mesa','MesasController@ListarMsa');

$app->get('/users', ['uses' => 'UsersController@index']);



$app->get('/sala','SalaController@index');
$app->post('/sala','SalaController@store');
$app->get('/sala/{idsala}','SalaController@show');
$app->put('/sala/{idsala}','SalaController@update');


$app->post('/sala/salir','SalaController@salirDeSala');
$app->post('/sala/ingresar','SalaController@IngresarSala');
$app->post('/sala/evaluar','EvaluacionController@EvaluacionSala');



$app->put('/sala/edit/{idsala}','SalaController@destroy');

$app->delete('/sala/{idsala}','SalaController@destroy');




$app->get('/partidos','PartidoController@index');
$app->post('/partidos/Sala','PartidoController@Sala');



$app->get('/noticias','NoticiaController@index');
