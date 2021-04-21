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

    public function addCharacter(Request $request) {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:characters',
            'real_name' => 'required',
            'resume' => 'required',
            'image' => 'file|mimes:jpg,png'
        ]);

        if (!$validator->fails()) {
            $newCharacter = new Character;
            $newCharacter->name = $request->input('name');
            $newCharacter->real_name = $request->input('real_name');
            $newCharacter->resume = $request->input('resume');
            $newCharacter->id_comics = $request->input('id_comics');
            $newCharacter->id_movies = $request->input('id_movies');
            $newCharacter->id_series = $request->input('id_series');
            if ($request->input('cover_url') || $request->file('image')) {
                if ($request->input('cover_url')) {
                    $newCharacter->cover_url = $request->input('cover_url');
                } else {
                    $image = $request->file('image')->store('public');
                    $imageName = explode('public/', $image);
                    $newCharacter->cover_url = asset('storage/'.$imageName[1]);
                }                
            }
            $newCharacter->save();
            
            $array['results'] = 'Personagem criado com sucesso!';
        } else {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        return $array;
    }

    public function setCharacter($id, Request $request) {
        $array = ['error' => ''];

        if (!Character::find($id)) {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'file|mimes:jpg,png'
        ]);
        if (!$validator) {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        $name = $request->input('name');
        $real_name = $request->input('real_name');
        $resume = $request->input('resume');
        $cover_url = $request->input('cover_url');
        $image = $request->file('image');
        $id_comics = $request->input('id_comics');
        $id_movies = $request->input('id_movies');
        $id_series = $request->input('id_series');
        
        $updates = [];
        if ($name) {
            $updates['name'] = $name;
        }
        if ($real_name) {
            $updates['real_name'] = $real_name;
        }
        if ($resume) {
            $updates['resume'] = $resume;
        }
        if ($id_comics) {
            $updates['id_comics'] = $id_comics;
        }
        if ($id_movies) {
            $updates['id_movies'] = $id_movies;
        }
        if ($id_series) {
            $updates['id_series'] = $id_series;
        }
        if ($cover_url || $request->hasFile('image')) {
            if ($cover_url) {
                $updates['cover_url'] = $cover_url;
            } else {
                $image = $request->file('image')->store('public');
                $imageName = explode('public/', $image);
                $updates['cover_url'] = asset('storage/'.$imageName[1]);
            }
        }

        $query = Character::where('id', $id)
        ->update($updates);  
        
        $array['results'] = 'Alteração efetuada com sucesso!';

        return $array;
    }

    public function delCharacter($id) {
        $array = ['error' => ''];

        if (!Character::find($id)) {
            $array['error'] = 'Personagem não encontrado';
            return response()->json($array, 404);            
        }

        Character::find($id)->delete();

        $array['results'] = 'Personagem excluído com sucesso!';


        return $array;
    }
}
