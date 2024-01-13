<?php

namespace App\Jobs;

use App\Mail\ForgetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Event\Code\Throwable;

class UpdatePassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $email;
    protected $data;

    public function __construct($email, $data)
    {
        $this->email = $email;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = [
            'code' => $this->data['code'],
        ];
        Mail::to($this->email)->send(new ForgetPassword($data));
    }

    public function failed(Throwable $e)
    {
        info('Email was not sent');
    }
}
