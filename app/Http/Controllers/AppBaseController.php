<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use InfyOm\Generator\Utils\ResponseUtil;
use Response;

class AppBaseController extends Controller
{

    public function sendResponse($data, $message, $code = 200): \Illuminate\Http\JsonResponse
    {
        return Response::json(ResponseUtil::makeResponse($message, $data), $code);
    }

    public function sendError($error, $code = 400): \Illuminate\Http\JsonResponse
    {
        return Response::json($this->_makeError($error), $code);
//        return Response::json(ResponseUtil::makeError($error), $code);
    }

    private function _makeError($message, array $data = []): array
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];
        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    public function sendSuccess($message, $code = 200): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => $message,
        ], $code);
    }

    public function sendRetrieved($modelName, $data): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => "{$modelName} retrieved successfully",
            'data'    => $data,
        ], 200);
    }

    public function sendCreated($modelName, $data): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => "{$modelName} created successfully",
            'data'    => $data,
        ], 201);
    }

    public function sendUpdated($modelName, $data): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => "{$modelName} updated successfully",
            'data'    => $data,
        ], 203);
    }

    public function sendDeleted($modelName): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message' => "{$modelName} deleted successfully",
        ], 204);
    }

    public function paginatorData(LengthAwarePaginator $paginator, string $resource): array
    {
        return [
            'meta'  => [
                'per_page'     => $paginator->perPage(),
                'last_page'    => $paginator->lastPage(),
                'current_page' => $paginator->currentPage(),
                'total'        => $paginator->total(),
                'from'         => $paginator->firstItem(),
                'to'           => $paginator->lastItem(),
            ],
            'items' => $paginator->items(),
//            'items' => $resource::collection($paginator->items()),
//            'items' => call_user_func("$resource::collection", $paginator->items()),
        ];
    }

}
