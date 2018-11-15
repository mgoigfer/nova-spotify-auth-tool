<?php

namespace Mgoigfer\SpotifyAuthTool\Http\Controllers;

use DB;
use Illuminate\Routing\Controller;

class SpotifyAuthToolApiController extends Controller
{
    /**
     * Get refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRefreshToken()
    {
        $refresh_token = DB::table('spotify')->where('key', 'refresh_token')->exists()
            ? DB::table('spotify')->where('key', 'refresh_token')->first()->value
            : '';

        return response()->json($refresh_token);
    }
}
