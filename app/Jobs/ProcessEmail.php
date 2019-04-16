<?php

namespace App\Jobs;

use App\WorkMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $workMessage;
    /**
     * Create a new job instance.
     *
     * @return void
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
        $this->workMessage;
        $a = 5;
    }
}
