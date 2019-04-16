<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\ClientSendMail;

class SendMailController extends SiteController
{

    /**
     * @param SendMailRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SendMailRequest $request)
    {
        $inputs = $request->only(['name', 'phone', 'message']);
        $this->sendMail($inputs);
        return response()->json(['success' => true]);
    }


    private function sendMail(array $inputs)
    {
        $inputs['companyEmail'] = config('settings.email');
        return \Mail::to($inputs['companyEmail'])->send(new ClientSendMail($inputs));
    }


}
