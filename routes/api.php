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
    return 'pong';
});

//rotas publicas
Route::get('/401', [AuthController::class, 'unauthorized'])->name('login'); //OK
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);


Route::get('/characters', [CharacterController::class, 'getList']); //OK
//input: name,comic,movie,series,limit,offset
Route::get('/character/{id}', [CharacterController::class, 'getCharacter']); //OK

Route::get('/character/{id}/comics', [CharacterController::class, 'getComics']); //OK
//input: limit, offset
Route::get('/character/{id}/movies', [CharacterController::class, 'getMovies']); //OK
//input: limit, offset
Route::get('/character/{id}/series', [CharacterController::class, 'getSeries']); //OK
//input: limit, offset
Route::get('/character/{id}/images', [CharacterController::class, 'getImages']); //OK
//input: limit, offset


Route::get('/comics', [ComicController::class, 'getList']); //OK
//input: title,character,limit,offset
Route::get('/comic/{id}', [ComicController::class, 'getComic']); //OK

Route::get('/comic/{id}/characters', [ComicController::class, 'getCharacters']); //OK
//retornar id, nome, cover
Route::get('/comic/{id}/images', [ComicController::class, 'getImages']); //OK 
//input: limit, offset

Route::get('/movies', [MovieController::class, 'getList']); //OK
//input: title,character,limit,offset
Route::get('/movie/{id}', [MovieController::class, 'getMovie']); //OK

Route::get('/movie/{id}/characters', [MovieController::class, 'getCharacters']); //OK
//retornar id, nome, cover
Route::get('/movie/{id}/images', [MovieController::class, 'getImages']); //OK
//input: limit, offset

Route::get('/series', [SerieController::class, 'getList']); //fazer paginação
Route::get('/serie{id}', [SerieController::class, 'getSerie']);
Route::get('/serie{id}/characters', [SerieController::class, 'getCharacters']); //retornar id, nome, cover
Route::get('/serie{id}/images', [SerieController::class, 'getImages']); //fazer paginação


//Rotas autenticadas
Route::middleware('auth:api')->group(function(){
    Route::post('/auth/validate', [AuthController::class, 'validateToken']);
    Route::post('/auth/logout', [AuthController::class, 'logout']); //OK
    
    //Rotas para editores
    Route::post('/character', [CharacterController::class, 'addCharacter']);
    Route::put('/character{id}', [CharacterController::class, 'setCharacter']);
    Route::delete('/character{id}', [CharacterController::class, 'delCharacter']);    
    
    Route::post('/comic', [ComicController::class, 'addComic']);
    Route::put('/comic{id}', [ComicController::class, 'setComic']);
    Route::delete('/comic{id}', [ComicController::class, 'delComic']);
    
    Route::post('/movie', [MovieController::class, 'addMovie']);
    Route::put('/movie{id}', [MovieController::class, 'setMovie']);
    Route::delete('/movie{id}', [MovieController::class, 'delMovie']);

    Route::post('/serie', [SerieController::class, 'addSerie']);
    Route::put('/serie{id}', [SerieController::class, 'setSerie']);
    Route::delete('/serie{id}', [SerieController::class, 'delSerie']);

    //Rotas para administrador
    Route::get('/users', [UserController::class, 'getList']);
    Route::put('/approve', [UserController::class, 'approveUser']);
    Route::delete('/user', [UserController::class, 'deleteUser']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
