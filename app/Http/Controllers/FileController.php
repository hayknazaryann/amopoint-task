<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class FileController extends Controller
{
    /**
     * @var FileService
     */
    protected FileService $fileService;


    /**
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('import.index');
    }


    /**
     * @param ImportRequest $request
     * @return JsonResponse
     */
    public function import(ImportRequest $request): JsonResponse
    {
        try {
            return Response::json([
                'success' => true,
                'data' => $this->fileService->content($request->file('file'))
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Import error: ' . $exception->getMessage());
            return Response::json([
                'success' => false,
                'error' => 'Something went wrong!'
            ], 400);
        }
    }
}
