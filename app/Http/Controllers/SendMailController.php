<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Models\Work;
use App\Services\WorkMessageService;
use Illuminate\Http\JsonResponse;

class SendMailController extends SiteController
{
    /**
     * @param SendMailRequest    $request
     * @param WorkMessageService $workMessageService
     *
     * @return JsonResponse
     */
    public function store(SendMailRequest $request, WorkMessageService $workMessageService): JsonResponse
    {
        $inputs            = $request->only(['name', 'phone', 'message']);
        $work              = Work::where('name', config('settings.catClientEmail'))->first();
        $inputs['work_id'] = $work ? $work->id : 1;
        $result            = $workMessageService->save($inputs);
        return response()->json($result);
    }
}
