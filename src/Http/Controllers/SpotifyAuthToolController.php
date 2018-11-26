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
        $spotify = app()
            ->make('SpotifyWrapper', [
                'callback' => '/nova-vendor/nova-spotify-auth-tool/auth',
                'scope' => [],
                'show_dialog' => true,
            ])
            ->requestAccessToken();

        $spotify->api->setAccessToken($spotify->session->getAccessToken());

        Spotify::updateOrCreate(
            ['key' => 'user_id'],
            ['value' => $spotify->api->me()->id]
        );

        Spotify::updateOrCreate(
            ['key' => 'refresh_token'],
            ['value' => $spotify->session->getRefreshToken()]
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
        return response()->json(Spotify::userId());
    }

    /**
     * Get refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRefreshToken()
    {
        return response()->json(Spotify::refreshToken());
    }
}
