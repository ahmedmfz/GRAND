<?php

namespace App\Jobs;

use App\Mail\RememberAd;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $advertisements)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
        foreach($this->advertisements as $advertisement){
            Mail::to($advertisement->advertiser->email)
            ->send(new RememberAd($advertisement->advertiser));
        }
    }
}
