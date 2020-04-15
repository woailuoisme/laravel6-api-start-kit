<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($data, $message, $code = 200): \Illuminate\Http\JsonResponse
    {
        return Response::json(ResponseUtil::makeResponse($message, $data), $code);
    }

    public function sendError($error, $code = 400): \Illuminate\Http\JsonResponse
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message, $code=200): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], $code);
    }
}
