<?php

namespace App\Http\API\Controllers;

use App\Contracts\BookingServiceContract;
use App\Http\API\Requests\Booking\CreateRequest;
use App\Http\API\Resources\Booking\BookingResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Throwable;

class BookingController extends Controller
{
    public function create(CreateRequest $request, BookingServiceContract $service): BookingResource|JsonResponse
    {
        try {
            return new BookingResource(
                $service->create($request->validated())
            );
        } catch (Throwable $e) {
            $code = (int) $e->getCode();
            if ($code < 100 || $code > 600) {
                $code = 501;
            }

            return new JsonResponse(['message' => $e->getMessage()], $code);
        }
    }
}
