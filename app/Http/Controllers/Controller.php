<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected static function sendJsonResponse($status, $data = [], $code = 200, $errors = []): JsonResponse
	{
		return response()->json([
			'status' => $status,
			'data' => $data,
			'errors' => $errors
		], $code);
	}
}
