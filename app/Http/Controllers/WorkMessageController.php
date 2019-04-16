<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkMessageRequest;
use App\Services\WorkMessageService;

class WorkMessageController extends Controller
{
    /**
     * @param WorkMessageRequest $request
     * @param WorkMessageService $workMessageService
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(WorkMessageRequest $request, WorkMessageService $workMessageService)
    {
        $inputs = $request->all();
        $result = $workMessageService->save($inputs);
        return response()->json($result);
    }
}
