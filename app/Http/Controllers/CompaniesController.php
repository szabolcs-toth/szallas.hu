<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesGetRequest;
use App\Http\Requests\CompaniesStoreRequest;
use App\Http\Requests\CompaniesUpdateRequest;
use App\Services\CompaniesService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class CompaniesController extends Controller
{
    /**
     * Store a new Company
     *
     * @param CompaniesStoreRequest $request
     * @return JsonResponse
     * @throws Exception|Throwable
     */
    public function store(CompaniesStoreRequest $request): JsonResponse
    {
        try {
            $success = (new CompaniesService)->store($request->all());
        } catch (Throwable $e) {
            $success = false;
            Log::error('Cant save the model', ['error' => $e]);
        }

        if($success) {
            return response()->json([
                'message' => 'Success'
            ]);
        } else {
            return response()->json([
                'message' => 'Cant save the Company'
            ], 422);
        }
    }

    /**
     * Get a company by id
     *
     * @param CompaniesGetRequest $request
     * @return JsonResponse
     */
    public function index(CompaniesGetRequest $request): JsonResponse
    {
        try {
            $data = (new CompaniesService)->findByIds($request->input('companyIds'));
        } catch (Throwable $e) {
            $data = null;
            Log::error('Unexpected exception', ['error' => $e]);
        }

        if($data) {
            return response()->json([
                'message' => 'Success',
                'data' => $data?->toArray()
            ]);
        } else {
            return response()->json([
                'message' => 'Companies not found'
            ], 404);
        }
    }

    /**
     * Store a new Company
     *
     * @param CompaniesUpdateRequest $request
     * @return JsonResponse
     */
    public function update(CompaniesUpdateRequest $request): JsonResponse
    {
        try {
            $success = (new CompaniesService)->update($request->input('companyId'), $request->all());
        } catch (Throwable $e) {
            $success = false;
            Log::error('Cant save the model', ['error' => $e]);
        }

        if($success) {
            return response()->json([
                'message' => 'Success'
            ]);
        } else {
            return response()->json([
                'message' => 'Cant save the Company'
            ], 422);
        }
    }
}
