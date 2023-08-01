<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*============================\\
||           CIDADE           ||
\\============================*/
Route::get('cidades', 'App\Http\Controllers\CityController@index');

/*============================\\
||           MEDICOS           ||
\\============================*/
Route::get('medicos', 'App\Http\Controllers\DoctorController@index');


/*============================\\
||       AUTHENTICATE         ||
\\============================*/
Route::post('login', 'App\Http\Controllers\AuthController@login');


Route::group(["middleware" => "api"], function () use ($router)
{

  /*============================\\
  ||           MEDICOS           ||
  \\============================*/
  $router->group(['prefix' => 'medico'], function ($router) {

    $router->post("/", "App\Http\Controllers\DoctorController@store");

    $router->post("/{id_medico}/pacientes", "App\Http\Controllers\DoctorController@addPatient");

    $router->get("/{id_medico}/pacientes", "App\Http\Controllers\DoctorController@getAllPatientsByDoctor");
  });

  /*============================\\
  ||           CIDADES           ||
  \\============================*/
  $router->group(['prefix' => 'cidades'], function ($router) {

    $router->get("/{id_cidade}/medicos", "App\Http\Controllers\CityController@getDoctors");
  });

  /*============================\\
  ||         PACIENTES           ||
  \\============================*/
  $router->group(['prefix' => 'pacientes'], function ($router) {

    $router->post("/", "App\Http\Controllers\PatientController@store");

    $router->post("/{id_paciente}", "App\Http\Controllers\PatientController@updatePatient");
  });
});
