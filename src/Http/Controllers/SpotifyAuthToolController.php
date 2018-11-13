<?php

namespace Mgoigfer\SpotifyAuthTool\Http\Controllers;

use DB;
use Illuminate\Routing\Controller;

class SpotifyAuthToolController extends Controller
{
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
        ]);

        $refresh_token = $spotify->requestRefreshToken();

        if (DB::table('spotify')->where('key', "refresh_token")->first()) {
            DB::table('spotify')->where('key', "refresh_token")->update([
                'value' => $refresh_token,
            ]);
        } else {
            DB::table('spotify')->insert([
                'key' => "refresh_token",
                'value' => $refresh_token,
            ]);
        }

        return redirect('nova/nova-spotify-auth-tool');
    }
}
