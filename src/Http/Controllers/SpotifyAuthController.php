<?php

namespace Mgoigfer\NovaSpotifyAuthTool\Http\Controllers;

use Illuminate\Routing\Controller;
use SpotifyWebAPI\Session;

class SpotifyAuthController extends Controller
{
    /**
     * The Spotify session.
     */
    private $spotify_session;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->spotify_session = app()->make(Session::class, [
            'callback' => '/nova/nova-spotify-auth-tool',
        ]);
    }

    /**
     * Get Spotify refresh token callback.
     *
     * @return mixed
     */
    public function auth()
    {
        dd($this->spotify_session);
    }
}
