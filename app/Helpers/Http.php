<?php
namespace App\Helpers;

use Illuminate\Http\Response;

class Http
{
    const OK = 'OK';
    const CREATED = 'CREATED';
    const ERROR = 'ERROR';
    const DENY_BOT = 'BOT';
    const NOT_FOUND = 'NOTFOUND';
    const UNPROCESSABLE_CONTENT = 'UNPROCESSABLECONTENT';
    const ERROR_SERVER = 'ERRORSERVER';

    /**
     * Construye y devuelve una respuesta HTTP JSON.
     *
     * @param string|null $tipoRespuesta - Tipo de respuesta.
     * @param mixed $datos - Datos a enviar en la respuesta.
     * @param bool $cache - Indica si la respuesta debe ser caché.
     * @return \Illuminate\Http\JsonResponse - Respuesta HTTP JSON.
     */
    public static function respuesta($tipoRespuesta, $datos, $cache = false): \Illuminate\Http\JsonResponse
    {
        $codigo = self::getCodigoRespuesta($tipoRespuesta);

        $response = response()->json([
            'resultado' => $tipoRespuesta,
            'datos' => $datos,
            'entregado' => date('Y-m-d H:i:s e'),
            'consumo' => round(microtime(true) - APP_START_TIME, 2),
        ], $codigo);

        if ($cache) {
            $response->header('Cache-Control', 'max-age=600, public');
        } else {
            $response->header('Cache-Control', 'no-store');
        }

        return $response;
    }

    /**
     * Obtiene el código de respuesta HTTP correspondiente al tipo de respuesta.
     *
     * @param string $tipoRespuesta - Tipo de respuesta.
     * @return int - Código de respuesta HTTP.
     */
    private static function getCodigoRespuesta($tipoRespuesta): int
    {
        switch ($tipoRespuesta) {
            case self::CREATED:
                return Response::HTTP_CREATED;
            case self::ERROR:
                return Response::HTTP_BAD_REQUEST;
            case self::DENY_BOT:
                return Response::HTTP_FORBIDDEN;
            case self::NOT_FOUND:
                return Response::HTTP_NOT_FOUND;
            case self::UNPROCESSABLE_CONTENT:
                return Response::HTTP_UNPROCESSABLE_ENTITY;
            case self::ERROR_SERVER:
                return Response::HTTP_INTERNAL_SERVER_ERROR;
            default:
                return Response::HTTP_OK;
        }
    }
}
