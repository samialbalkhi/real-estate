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
        $agoraAppId = '7b66926d1d9e44c59e0af55ec061b500';
        $agoraAppCertificate = '236ecf1cac8347c78e697e2285e861cd';
        $agoraRsetApi = 'a61.chat.agora.io';
        $agoraOrgName = '611081744';
        $agoraAppName = '1261637';
        $agoraApiUrl = "https://{$agoraRsetApi}/{$agoraOrgName}/{$agoraAppName}/users";

        $client = new Client;

        $response = $client->post($agoraApiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . '007eJxTYLB/vXW3Wo6nvvytm1Pn1i3v7nbJX11Q9k7YSt1KpnarZosCg3mSmZmlkVmKYYplqolJsqllqkFimqlparKBmWGSqYGB8LdNqQ2BjAyPlzxgZmRgZWBkYGIA8RkYAGyVHcg=',
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
