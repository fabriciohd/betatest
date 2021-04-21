<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Character;
use App\Models\Comic;
use App\Models\Image;

class ComicController extends Controller
{
    public function getList(Request $request) {
        $array = ['error' => ''];

        $title = $request->input('title');
        $character = $request->input('character');
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $query = Comic::select('id', 'title', 'cover_url');
        if ($title) {
            $query->where('title', 'LIKE', '%'.$title.'%');
        }
        if ($character) {
            $character = Character::find($character);
            if ($character) {
                $character = explode(',', $character['id_comics']);
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

    public function getComic($id) {
        $array = ['error' => ''];

        $comic = Comic::find($id);
        if ($comic) {
            $array['results'] = $comic;
        } else {
            $array['error'] = 'HQ não encontrada';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getCharacters($id) {
        $array = ['error' => ''];

        $comic = Comic::find($id);
        if ($comic) {
            $characters = Character::select('id', 'name', 'cover_url')
            ->where('id_comics', 'LIKE', '%'.$id.'%')
            ->get();

            $array['results'] = $characters;
        } else {
            $array['error'] = 'HQ não encontrada';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function getImages($id, Request $request) {
        $array = ['error' => ''];

        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $comic = Comic::find($id);
        if ($comic) {
            $query = Image::select('image_url')->where('id_comics', 'LIKE', '%'.$id.'%');
    
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
            $array['error'] = 'HQ não encontrado';
            return response()->json($array, 404);
        }

        return $array;
    }

    public function addComic(Request $request) {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:comics',
            'published_date' => 'required|date|date_format:Y-m-d',
            'writer' => 'required',
            'penciler' => 'required',
            'resume' => 'required',
            'image' => 'file|mimes:jpg,png'
        ]);

        if (!$validator->fails()) {
            $newComic = new Comic;
            $newComic->title = $request->input('title');
            $newComic->published_date = $request->input('published_date');
            $newComic->writer = $request->input('writer');
            $newComic->penciler = $request->input('penciler');
            $newComic->resume = $request->input('resume');            
            if ($request->input('cover_url') || $request->file('image')) {
                if ($request->input('cover_url')) {
                    $newComic->cover_url = $request->input('cover_url');
                } else {
                    $image = $request->file('image')->store('public');
                    $imageName = explode('public/', $image);
                    $newComic->cover_url = asset('storage/'.$imageName[1]);
                }                
            }
            $newComic->save();
            
            $array['results'] = 'HQ criada com sucesso!';
        } else {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        return $array;
    }

    public function setComic($id, Request $request) {
        $array = ['error' => ''];

        if (!Comic::find($id)) {
            $array['error'] = 'HQ não encontrada';
            return response()->json($array, 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'file|mimes:jpg,png',
            'published_date' => 'date|date_format:Y-m-d'
        ]);
        if (!$validator) {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        $title = $request->input('title');
        $published_date = $request->input('published_date');
        $writer = $request->input('writer');
        $penciler = $request->input('penciler');
        $resume = $request->input('resume');
        $cover_url = $request->input('cover_url');
        $image = $request->file('image');
        
        $updates = [];
        if ($title) {
            $updates['title'] = $title;
        }
        if ($published_date) {
            $updates['published_date'] = $published_date;
        }
        if ($writer) {
            $updates['writer'] = $writer;
        }
        if ($penciler) {
            $updates['penciler'] = $penciler;
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

        $query = Comic::where('id', $id)
        ->update($updates);  
        
        $array['results'] = 'Alteração efetuada com sucesso!';

        return $array;
    }

    public function delComic($id) {
        $array = ['error' => ''];

        if (!Comic::find($id)) {
            $array['error'] = 'HQ não encontrada';
            return response()->json($array, 404);            
        }

        Comic::find($id)->delete();

        $array['results'] = 'HQ excluída com sucesso!';

        return $array;
    }
}
