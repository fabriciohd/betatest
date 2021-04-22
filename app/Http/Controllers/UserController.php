<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserController extends Controller
{
    public function getList(Request $request) {
        $array = ['error' => '', 'list' => ''];

        $name = $request->input('name');
        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $orderBy = $request->input('orderBy');

        $query = User::select();
        if ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
        if ($limit) {
            $query->limit($limit);
        } else {
            $query->limit(20);
        }
        if ($offset) {
            $query->offset($offset);
        }
        if ($orderBy == 'name' || $orderBy == 'email') {
            $query->orderBy($orderBy, 'ASC');
        }
        $array['list'] = $query->get();

        return $array;
    }

    public function approveUser($id, Request $request) {
        $array = ['error' => ''];

        if (!User::find($id)) {
            $array['error'] = 'Usuário não encontrado';
            return response()->json($array, 404);
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required',
        ]);

        $type = $request->input('type');

        if (!$validator->fails()) {
            if ($type == 'editor' || $type == 'adm') {
                $query = User::where('id', $id)
                ->update(['user_type' => $type]);
                $array['results'] = 'Tipo de usuário alterado com sucesso!';
            } else {
                $array['error'] = 'O campo type aceita apenas as strings: editor, adm';
                return response()->json($array, 422);
            }
        } else {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        return $array;
    }

    public function delUser($id) {
        $array = ['error' => ''];

        if (!User::find($id)) {
            $array['error'] = 'Usuário não encontrado';
            return response()->json($array, 404);            
        }

        User::find($id)->delete();

        $array['results'] = 'Usuário excluído com sucesso!';


        return $array;
    }
}
