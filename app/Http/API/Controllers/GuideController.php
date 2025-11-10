<?php

namespace App\Http\API\Controllers;

use App\Contracts\GuideServiceContract;
use App\Http\API\Requests\Guide\ListRequest;
use App\Http\API\Resources\Guide\GuideCollection;
use Throwable;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GuideController extends Controller
{
    public function list(ListRequest $request, GuideServiceContract $service): GuideCollection|JsonResponse
    {
        try {
            return new GuideCollection(
                $service->list($request->validated())->get()
            );
        } catch (Throwable $e) {
            $code = (int)$e->getCode();
            if ($code < 100 || $code > 600) {
                $code = 501;
            }
            return new JsonResponse(['message' => $e->getMessage()], $code);
        }
    }
}
