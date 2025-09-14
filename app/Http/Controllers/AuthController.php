<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

        $user = User::where('email', $request->email)
                    ->where('tenant_id', $request->tenant_id)
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Guzzle ile Password Grant token al
        $http = new HttpClient;

        try {
            $response = $http->post(config('app.url') . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('PASSPORT_CLIENT_ID'),
                    'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);

            $data = json_decode((string) $response->getBody(), true);

            // Tenant ID bilgisini de response'a ekle
            $data['tenant_id'] = $request->tenant_id;

            return response()->json($data);

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
