<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    CharacterController,
    ComicController,
    MovieController,
    SerieController,
    UserController
};

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

Route::get('/ping', function() {
    return ['pong' => true];
});

//rotas publicas
Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);


Route::get('/characters', [CharacterController::class, 'getList']);
Route::get('/character/{id}', [CharacterController::class, 'getCharacter']);
Route::get('/character/{id}/comics', [CharacterController::class, 'getComics']);
Route::get('/character/{id}/movies', [CharacterController::class, 'getMovies']);
Route::get('/character/{id}/series', [CharacterController::class, 'getSeries']);
Route::get('/character/{id}/images', [CharacterController::class, 'getImages']);


Route::get('/comics', [ComicController::class, 'getList']);
Route::get('/comic/{id}', [ComicController::class, 'getComic']);
Route::get('/comic/{id}/characters', [ComicController::class, 'getCharacters']);
Route::get('/comic/{id}/images', [ComicController::class, 'getImages']);

Route::get('/movies', [MovieController::class, 'getList']);
Route::get('/movie/{id}', [MovieController::class, 'getMovie']);
Route::get('/movie/{id}/characters', [MovieController::class, 'getCharacters']);
Route::get('/movie/{id}/images', [MovieController::class, 'getImages']);

Route::get('/series', [SerieController::class, 'getList']);
Route::get('/serie/{id}', [SerieController::class, 'getSerie']);
Route::get('/serie/{id}/characters', [SerieController::class, 'getCharacters']);
Route::get('/serie/{id}/images', [SerieController::class, 'getImages']);


//Rotas autenticadas
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api', 'check.editor'])->group(function(){
    //Rotas para editores
    Route::post('/character', [CharacterController::class, 'addCharacter']);
    Route::put('/character/{id}', [CharacterController::class, 'setCharacter']);
    Route::delete('/character/{id}', [CharacterController::class, 'delCharacter']);
    
    Route::post('/comic', [ComicController::class, 'addComic']); 
    Route::put('/comic/{id}', [ComicController::class, 'setComic']);
    Route::delete('/comic/{id}', [ComicController::class, 'delComic']);
    
    Route::post('/movie', [MovieController::class, 'addMovie']);
    Route::put('/movie/{id}', [MovieController::class, 'setMovie']);
    Route::delete('/movie/{id}', [MovieController::class, 'delMovie']);

    Route::post('/serie', [SerieController::class, 'addSerie']);
    Route::put('/serie/{id}', [SerieController::class, 'setSerie']);
    Route::delete('/serie/{id}', [SerieController::class, 'delSerie']);
});

Route::middleware(['auth:api', 'check.adm'])->group(function(){
    //Rotas para administrador
    Route::get('/users', [UserController::class, 'getList']);
    Route::put('/approve/{id}', [UserController::class, 'approveUser']);
    Route::delete('/user/{id}', [UserController::class, 'delUser']);
});



