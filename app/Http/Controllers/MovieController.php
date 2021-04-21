<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Character;
use App\Models\Movie;
use App\Models\Image;

class MovieController extends Controller
{
    public function getList(Request $request) {
        $array = ['error' => ''];

        $title = $request->input('title');
        $character = $request->input('character');
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $query = Movie::select('id', 'title', 'cover_url');
        if ($title) {
            $query->where('title', 'LIKE', '%'.$title.'%');
        }
        if ($character) {
            $character = Character::find($character);
            if ($character) {
                $character = explode(',', $character['id_movies']);
                $query->whereIn('id', $character);
            } else {
                $array['error'] = 'Personagem não encontrado';
                return response()->json($array, 404);
            }
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

    public function getMovie($id) {
        $array = ['error' => ''];

        $movie = Movie::find($id);
        if ($movie) {
            $array['results'] = $movie;
        } else {
            $array['error'] = 'Filme não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getCharacters($id) {
        $array = ['error' => ''];

        $movie = Movie::find($id);
        if ($movie) {
            $characters = Character::select('id', 'name', 'cover_url')
            ->where('id_movies', 'LIKE', '%'.$id.'%')
            ->get();

            $array['results'] = $characters;
        } else {
            $array['error'] = 'Filme não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getImages($id, Request $request) {
        $array = ['error' => ''];

        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $movie = Movie::find($id);
        if ($movie) {
            $query = Image::select('image_url')->where('id_movies', 'LIKE', '%'.$id.'%');
    
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
            $array['error'] = 'Filme não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function addMovie(Request $request) {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies',
            'release_date' => 'required|date|date_format:Y-m-d',
            'director' => 'required',
            'resume' => 'required',
            'image' => 'file|mimes:jpg,png'
        ]);

        if (!$validator->fails()) {
            $newMovie = new Movie;
            $newMovie->title = $request->input('title');
            $newMovie->release_date = $request->input('release_date');
            $newMovie->director = $request->input('director');
            $newMovie->resume = $request->input('resume');            
            if ($request->input('cover_url') || $request->file('image')) {
                if ($request->input('cover_url')) {
                    $newMovie->cover_url = $request->input('cover_url');
                } else {
                    $image = $request->file('image')->store('public');
                    $imageName = explode('public/', $image);
                    $newMovie->cover_url = asset('storage/'.$imageName[1]);
                }                
            }
            $newMovie->save();
            
            $array['results'] = 'Filme criado com sucesso!';
        } else {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        return $array;
    }

    public function setMovie($id, Request $request) {
        $array = ['error' => ''];

        if (!Movie::find($id)) {
            $array['error'] = 'Filme não encontrado';
            return response()->json($array, 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'file|mimes:jpg,png',
            'release_date' => 'date|date_format:Y-m-d'
        ]);
        if (!$validator) {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        $title = $request->input('title');
        $release_date = $request->input('release_date');
        $director = $request->input('director');
        $resume = $request->input('resume');
        $cover_url = $request->input('cover_url');
        $image = $request->file('image');
        
        $updates = [];
        if ($title) {
            $updates['title'] = $title;
        }
        if ($release_date) {
            $updates['release_date'] = $release_date;
        }
        if ($director) {
            $updates['director'] = $director;
        }
        if ($resume) {
            $updates['resume'] = $resume;
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

        $query = Movie::where('id', $id)
        ->update($updates);  
        
        $array['results'] = 'Alteração efetuada com sucesso!';

        return $array;
    }

    public function delMovie($id) {
        $array = ['error' => ''];

        if (!Movie::find($id)) {
            $array['error'] = 'Filme não encontrado';
            return response()->json($array, 404);            
        }

        Movie::find($id)->delete();

        $array['results'] = 'Filme excluído com sucesso!';

        return $array;
    }
}
