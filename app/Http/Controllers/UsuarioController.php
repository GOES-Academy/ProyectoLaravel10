<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Http;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    //Listado completo de usuarios
    public function listaUsuarios()
    {
        $usuarios = User::all();

        if (count($usuarios) == 0) {
            return Http::respuesta(Http::NOT_FOUND, ['error' => 'No hay usuarios registrados']);
        }

        return Http::respuesta(Http::OK, $usuarios);
    }

    //Obtener un usuario segun nombre por un get
    public function obtenerUsuarioGet($nombre)
    {
        $usuario = User::where('nombre', $nombre)->first();

        if (!$usuario) {
            return Http::respuesta(Http::NOT_FOUND, ['error' => 'No se encontro el usuario']);
        }

        return Http::respuesta(Http::OK, $usuario);
    }

    //Mensaje de saludo seguido de la concatenacion del nombre que recibo de un post
    public function obtenerUsuarioPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Http::respuesta(Http::UNPROCESSABLE_CONTENT, ['error' => $validator->errors()]);
        }

        return Http::respuesta(Http::OK, 'Hola ' . $request->nombre);
    }
}