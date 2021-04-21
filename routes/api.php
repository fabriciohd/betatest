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
    echo auth()->guard('api')->check();
    
    /* return ['pong' => true]; */
});

//rotas publicas
Route::get('/401', [AuthController::class, 'unauthorized'])->name('login'); //OK
Route::post('/auth/login', [AuthController::class, 'login']); //OK
Route::post('/auth/register', [AuthController::class, 'register']); //OK


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

Route::get('/series', [SerieController::class, 'getList']); //OK
//input: title,character,limit,offset
Route::get('/serie/{id}', [SerieController::class, 'getSerie']); //ok
Route::get('/serie/{id}/characters', [SerieController::class, 'getCharacters']); //OK
//retornar id, nome, cover
Route::get('/serie/{id}/images', [SerieController::class, 'getImages']); //OK
//input: limit, offset


//Rotas autenticadas
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:api'); //OK

Route::middleware(['auth:api', 'check.editor'])->group(function(){
    //Rotas para editores
    Route::post('/character', [CharacterController::class, 'addCharacter']); //OK
    //inputs: name, real_name, resume
    //inputs opcionais: cover_url, id_comics, id_movies, id_series, image
    Route::put('/character/{id}', [CharacterController::class, 'setCharacter']); //OK
    //inputs opcionais: name, real_name, resume, cover_url, id_comics, id_movies, id_series
    Route::delete('/character/{id}', [CharacterController::class, 'delCharacter']);  //OK  
    
    Route::post('/comic', [ComicController::class, 'addComic']); //OK
    //inputs: title, published_date, writer, penciler, resume
    //input opcional: cover_url, image
    Route::put('/comic/{id}', [ComicController::class, 'setComic']); //OK
    //inputs opcionais: title, published_date, writer, penciler, resume, cover_url, image
    Route::delete('/comic/{id}', [ComicController::class, 'delComic']); //OK
    
    Route::post('/movie', [MovieController::class, 'addMovie']); //OK
    //inputs: title, release_date, director, resume
    //input opcional: cover_url, image
    Route::put('/movie/{id}', [MovieController::class, 'setMovie']); //OK
    //inputs opcionais: title, release_date, director, resume, cover_url, image
    Route::delete('/movie/{id}', [MovieController::class, 'delMovie']); //OK

    Route::post('/serie', [SerieController::class, 'addSerie']); //OK
    //inputs: title, release_date, director, resume
    //input opcional: cover_url, image
    Route::put('/serie/{id}', [SerieController::class, 'setSerie']); //OK
    //inputs opcionais: title, release_date, director, resume, cover_url, image
    Route::delete('/serie/{id}', [SerieController::class, 'delSerie']); //OK
});

Route::middleware(['auth:api', 'check.adm'])->group(function(){
    //Rotas para administrador
    Route::get('/users', [UserController::class, 'getList']);
    Route::put('/approve', [UserController::class, 'approveUser']);
    Route::delete('/user', [UserController::class, 'deleteUser']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
