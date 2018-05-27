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


$app->get('/key', function(){

  $client = new GuzzleHttp\Client();
  $res = $client->request('GET', 'https://jsonplaceholder.typicode.com/', [
  'headers' => [
  'Accept' => 'application/json',
  'Content-type’ => ‘application/json'
  ]]);

var_dump($res);exit;

});


$app->get('/users', ['uses' => 'UsersController@index']);



$app->get('/sala','SalaController@index');
$app->post('/sala','SalaController@store');
$app->get('/sala/{idsala}','SalaController@show');
$app->put('/sala/{idsala}','SalaController@update');
$app->delete('/sala/{idsala}','SalaController@destroy');


$app->get('/boards','BoardController@index');
$app->post('/boards','BoardController@store');
$app->post('/boards/{board}','BoardController@show');


$app->get('/partidos','PartidoController@index');

$app->get('/noticias','NoticiaController@index');
