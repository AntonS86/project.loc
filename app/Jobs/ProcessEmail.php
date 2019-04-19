<?php

namespace App\Jobs;

use App\Mail\WorkMessageMail;
use App\Models\WorkMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var WorkMessage
     */
    protected $workMessage;

    /**
     * Попытки отправить
     * @var int
     */
    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @param WorkMessage $workMessage
     */
    public function __construct(WorkMessage $workMessage)
    {
        $this->workMessage = $workMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->workMessage->load(['phone', 'work', 'images']);
        Mail::to(config('settings.email'))->send(new WorkMessageMail($this->workMessage));
    }
}
