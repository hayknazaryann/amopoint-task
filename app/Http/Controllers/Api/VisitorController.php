<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Repositories\Interfaces\VisitorInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use function Laravel\Prompts\select;

class VisitorController extends Controller
{
    /**
     * @var VisitorInterface
     */
    private VisitorInterface $visitorRepository;

    /**
     * @param VisitorInterface $visitorRepository
     */
    public function __construct(VisitorInterface $visitorRepository)
    {
        $this->visitorRepository = $visitorRepository;
    }

    /**
     * @return JsonResponse
     */
    public function visitorsByHours(): JsonResponse
    {
        $data = $this->visitorRepository->byHour();
        $labels = $data->keys()->toArray();
        $values = $data->values()->toArray();
        return Response::json([
            'data' => [
                'labels' => $labels, 'values' => $values
            ]
        ], 200);
    }

    /**
     * @return JsonResponse
     */
    public function visitorsByCity(): JsonResponse
    {
        $data = $this->visitorRepository->byCity();
        $labels = $data->keys()->toArray();
        $values = $data->values()->toArray();
        return Response::json([
            'data' => [
                'labels' => $labels, 'values' => $values
            ]
        ], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $this->visitorRepository->create($request->all());
            return Response::json([
                'success' => true,
            ], 201);
        } catch (\Exception $exception) {
            return Response::json([
                'success' => false,
            ], 400);
        }
    }
}
