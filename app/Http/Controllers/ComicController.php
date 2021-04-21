<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
