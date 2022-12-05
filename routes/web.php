<?php

use Http\Controllers\AuthController;
/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/key', function () {
    return Str::random(32);
});
$router->get('/get', function () {
    return 'GET';
});
$router->post('/post', function () {
    return 'POST';
});

$router->put('/put', function () {
    return 'PUT';
});

$router->patch('/patch', function () {
    return 'PATCH';
});

$router->delete('/delete', function () {
    return 'DELETE';
});

$router->options('/options', function () {
    return 'OPTIONS';
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/register', ['uses'=> 'AuthController@register']);
    $router->post('/login', ['uses'=> 'AuthController@login']);
});

$router->get('/home', ['middleware' => 'jwt.auth', 'uses' => 'HomeController@home']);

$router->group(['prefix' => 'matakuliah'], function () use ($router) {
    $router->post('/', ['uses' => 'MataKuliahController@createMataKuliah']);
    $router->get('/', ['uses' => 'MataKuliahController@getAllMatkul']);
  });
  
  $router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->post('/matakuliah/{mkId}', ['middleware' => 'jwt.auth','uses' => 'MahasiswaController@addMataKuliahWithToken']);
  $router->post('/{nim}/matakuliah/{mkId}', ['uses' => 'MahasiswaController@addMataKuliah']);
  $router->put('/{nim}/matakuliah/{mkId}', ['uses' => 'MahasiswaController@deleteMahasiswaMatkul']);
    $router->get('/', ['uses' => 'MahasiswaController@getAllMahasiswa']);
    $router->get('/profile', ['middleware' => 'jwt.auth', 'uses' => 'HomeController@home']); //
    $router->get('/{nim}', ['uses' => 'MahasiswaController@getMahasiswaByNim']);
  });