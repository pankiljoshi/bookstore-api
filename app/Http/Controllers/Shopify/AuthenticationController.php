<?php

namespace App\Http\Controllers\Shopify;

use App\Helpers\Settings;
use Illuminate\Http\Request;
use App\Services\Shopify\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthenticationController extends Controller
{
    public function authorization(Request $request): RedirectResponse | JsonResponse
    {
        $shopify_auth = resolve(Auth::class);
        if ($request->input('code')) {
            $access_token = $shopify_auth->getAccessToken();
            Settings::save('access_token', $access_token);
            return response()->json(['access_token' => $access_token]);
        }
        return redirect()->to($shopify_auth->getAuthorizationUrl());
    }
}
