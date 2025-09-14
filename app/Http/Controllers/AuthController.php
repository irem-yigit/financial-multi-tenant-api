<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client;
use GuzzleHttp\Client as HttpClient;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'tenant_id' => 'required|string',
        ]);

        $http = new HttpClient;

        $client = [
            'id' => '019942fe-66df-7383-ac53-a624162d32cd',             // client_id
            'secret' => '7x2PgIs27R2NoEkkSHLxeWHi8cfXVWuCdU14xNw5',     // client_secret
        ];

        try {
            $response = $http->post(config('app.url') . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $client['id'],
                    'client_secret' => $client['secret'],
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);

            $data = json_decode((string) $response->getBody(), true);

            // Tenant ID bilgisini de dönebiliriz
            $data['tenant_id'] = $request->tenant_id;

            return response()->json($data);

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
