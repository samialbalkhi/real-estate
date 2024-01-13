<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PHPUnit\Event\Code\Throwable;

class RegistrationAgora implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $agoraAppId = '7b99b46b4fbb4fc183a73d0c4ed33054';
        $agoraAppCertificate = 'e5018477219141c3ad7bd21c493a863c';
        $agoraRsetApi = 'a71.chat.agora.io';
        $agoraOrgName = '711084304';
        $agoraAppName = '1264508';
        $agoraApiUrl = "https://{$agoraRsetApi}/{$agoraOrgName}/{$agoraAppName}/users";

        $client = new Client;

        $response = $client->post($agoraApiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . '007eJxTYEg4PFNeyLxN5HLnyhaNzey9IXNXfnj1lqnipsZeyUVPxDoVGMyTLC2TTMySTNKSgDjZ0MI40dw4xSDZJDXF2NjA1MRn57zUhkBGhuXRbKyMDKwMjAxMDCA+AwMAh/cdfg==',
            ],
            'json' => [
                'username' => (string) $this->user->id,
                'app_id' => $agoraAppId,
                'app_certificate' => $agoraAppCertificate,
                'user_id' => $this->user->id,
            ],
        ]);

        $token = $this->user->createToken('token-name', ['user'])->plainTextToken;
        $agora_data = ['agora_data' => json_decode($response->getBody(), true)];

    }

    public function failed(Throwable $e)
    {
        info('Something went wrong');
    }
}
