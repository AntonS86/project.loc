<?php


namespace App\Models\WorkMessage;


use App\Jobs\ProcessEmail;
use App\Models\WorkMessage;

class QueueObserver
{
    /**
     * отправляет сохраненные сообщения в очередь на рассылку
     *
     * @param WorkMessage $workMessage
     */
    public function created(WorkMessage $workMessage): void
    {
        ProcessEmail::dispatch($workMessage);
    }
}
