<?php


namespace App\Services;


use App\Jobs\ProcessEmail;
use App\Mail\WorkMessageMail;
use App\Phone;
use App\WorkMessage;

class WorkMessageService
{
    /**
     * @param $inputs
     *
     * @return bool
     */
    public function save($inputs): bool
    {
        $workMessage           = new WorkMessage();
        $workMessage->name     = $inputs['name'];
        $workMessage->message  = $inputs['message'];
        $workMessage->work_id  = $inputs['work_id'];
        $workMessage->phone_id = $this->getPhoneId($inputs['phone']);
        $result = $workMessage->save();

        if (isset($inputs['images'])) {
            $workMessage->images()->detach($inputs['images']);
        }
        //TODO : доделать очередь
        //ProcessEmail::dispatch($workMessage);
        return $result;
    }

    private function getPhoneId(string $phone)
    {
        $ph = new Phone();
        return $ph->firstOrCreate(
            ['number' => $ph->phoneReplace($phone)]
        )->id;
    }


}
