<?php

namespace App\Service\Frontend;

use App\Models\User;
use GuzzleHttp\Client;
use App\Traits\ImageUpload;
use App\helpers\ApiResponse;
use App\Http\Requests\Frontend\RegisterRequest;

class RegisterService
{
    use ImageUpload;

    public function store(RegisterRequest $request)
    {
      $user = User::create([
        'image' => $this->uploadImage('user_image'),
    ] + $request->validated());

    $agoraAppId = '611081744#1261637';
    // $agoraAppCertificate = 'YOUR_AGORA_APP_CERTIFICATE';
    $agoraApiUrl =  'https://XXXXXXXXXXXXX/611081744/1261637/'.$user;
    ;

    $client = new Client();
    try {
        $response = $client->post($agoraApiUrl, [
            'json' => [
                'app_id' => $agoraAppId,
                // 'app_certificate' => $agoraAppCertificate,
                'user_id' => $user->id, // Assuming user ID is unique and can be used as Agora user ID
                // Add any other necessary user data for Agora Chat
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Handle the Agora Chat response data as needed
        // You might store Agora user ID or other relevant information in your local database

        $token = $user->createToken('token-name', ['user'])->plainTextToken;

        return ['token' => $token, 'agora_data' => $responseData];
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
        // return ApiResponse::createSuccessResponse();
    }
}
