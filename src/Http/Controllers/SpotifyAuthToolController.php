<?php

namespace Mgoigfer\SpotifyAuthTool\Http\Controllers;

use Illuminate\Routing\Controller;
use Mgoigfer\SpotifyAuthTool\Models\Spotify;

class SpotifyAuthToolController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Web
    |--------------------------------------------------------------------------
    */

    /**
     * Spotify authentication.
     *
     * @return mixed
     */
    public function auth()
    {
        $spotify = app()->make('SpotifyWrapper', [
            'callback' => '/nova-vendor/nova-spotify-auth-tool/auth',
            'scope' => [],
            'show_dialog' => true,
        ]);

        // Request an access token. The user will be redirected to Spotify to
        // approve the Spotify app.
        $accessToken = $spotify->requestAccessToken();

        // Authenticate Spotify API.
        $spotify->api->setAccessToken($accessToken);

        $me = $spotify->api->me();
        $refresh_token = $spotify->session->getRefreshToken();

        Spotify::updateOrCreate(
            ['key' => 'user_id'],
            ['value' => $me->id]
        );

        Spotify::updateOrCreate(
            ['key' => 'refresh_token'],
            ['value' => $refresh_token]
        );

        return redirect('nova/nova-spotify-auth-tool');
    }

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    */

    /**
     * Get Spotify user ID.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserId()
    {
        $userId = Spotify::userId();

        return response()->json($userId);
    }

    /**
     * Get refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRefreshToken()
    {
        $refreshToken = Spotify::refreshToken();

        return response()->json($refreshToken);
    }
}
