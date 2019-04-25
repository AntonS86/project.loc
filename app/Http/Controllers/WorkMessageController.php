<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkMessageRequest;
use App\Http\Requests\WorkMessageUpdateRequest;
use App\Models\WorkMessage;
use App\Services\WorkMessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class WorkMessageController extends Controller
{
    /**
     * @param WorkMessageRequest $request
     * @param WorkMessageService $workMessageService
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(WorkMessageRequest $request, WorkMessageService $workMessageService): JsonResponse
    {
        $inputs = $request->all();
        $result = $workMessageService->save($inputs);
        return response()->json($result);
    }

    public function update(WorkMessageUpdateRequest $request, WorkMessage $workMessage): JsonResponse
    {
        $workMessage->read = $request->input('read');
        $result            = $workMessage->save();
        return response()->json($result);
    }
}
