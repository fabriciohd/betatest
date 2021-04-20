<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Character;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Comic;
use App\Models\Image;

class CharacterController extends Controller
{
    public function getList(Request $request) {
        $array = ['error' => '', 'list' => ''];

        $name = $request->input('name');
        $comic = $request->input('comic');
        $movie = $request->input('movie');
        $serie = $request->input('serie');
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $query = Character::select('id', 'name', 'cover_url');
        if ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
        if ($comic) {
            $query->where('id_comics', 'LIKE', '%'.$comic.'%');
        }
        if ($movie) {
            $query->where('id_movies', 'LIKE', '%'.$movie.'%');            
        }
        if ($serie) {
            $query->where('id_series', 'LIKE', '%'.$serie.'%');
        }
        if ($limit) {
            $query->limit($limit);
        } else {
            $query->limit(20);
        }
        if ($offset) {
            $query->offset($offset);
        }
        $array['list'] = $query->get();

        return $array;
    }

    public function getCharacter($id) {
        $array = ['error' => ''];

        $character = Character::where('id', $id)->get();
        if ($character->count() > 0) {
            $array['results'] = $character;
        } else {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getComics($id, Request $request) {
        $array = ['error' => ''];

        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $character = Character::find($id);
        if ($character) {            
            $character = explode(',', $character['id_comics']);
            $query = Comic::whereIn('id', $character);
    
            if ($limit) {
                $query->limit($limit);
            } else {
                $query->limit(20);
            }
            if ($offset) {
                $query->offset($offset);
            }
    
            $array['results'] = $query->get();
        } else {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getMovies($id, Request $request) {
        $array = ['error' => ''];

        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $character = Character::find($id);
        if ($character) {            
            $character = explode(',', $character['id_movies']);
            $query = Movie::whereIn('id', $character);
    
            if ($limit) {
                $query->limit($limit);
            } else {
                $query->limit(20);
            }
            if ($offset) {
                $query->offset($offset);
            }
    
            $array['results'] = $query->get();
        } else {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getSeries($id, Request $request) {
        $array = ['error' => ''];

        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $character = Character::find($id);
        if ($character) {            
            $character = explode(',', $character['id_series']);
            $query = Serie::whereIn('id', $character);
    
            if ($limit) {
                $query->limit($limit);
            } else {
                $query->limit(20);
            }
            if ($offset) {
                $query->offset($offset);
            }
    
            $array['results'] = $query->get();
        } else {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getImages($id, Request $request) {
        $array = ['error' => ''];

        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $character = Character::find($id);
        if ($character) {
            $query = Image::select('image_url')->where('id_characters', 'LIKE', '%'.$id.'%');
    
            if ($limit) {
                $query->limit($limit);
            } else {
                $query->limit(20);
            }
            if ($offset) {
                $query->offset($offset);
            }
            
            $array['results'] = $query->get();
        } else {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }
}
