<?php

use App\Http\Controllers\AdocaoController;
use App\Http\Controllers\PerfilController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Rule\Parameters;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\AnimalController::class, 'index']);

Route::get('/perfil/{user}', [App\Http\Controllers\PerfilController::class, 'show']);

Route::resource('/animais', App\Http\Controllers\AnimalController::class, 
        [
            'parameters' => [
                'animais' => 'animal'
            ]
        ]
    )->middleware('auth')->except('index', 'show');

Route::resource('/animais', App\Http\Controllers\AnimalController::class, 
    [
        'parameters' => [
            'animais' => 'animal'
        ]
    ]
)->only('index', 'show');

Route::resource('/adocoes', AdocaoController::class,
    [
        'parameters' => [
            'adocoes' => 'adocao'
        ] 
    ])->middleware('auth')->only('index', 'store', 'update');

Route::get('/animais-cadastrados', [App\Http\Controllers\AnimalController::class, 'animaisCadastrados']);