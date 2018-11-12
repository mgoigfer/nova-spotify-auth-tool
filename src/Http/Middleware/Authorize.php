<?php

namespace Mgoigfer\NovaSpotifyAuthTool\Http\Middleware;

use Mgoigfer\NovaSpotifyAuthTool\NovaSpotifyAuthTool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaSpotifyAuthTool::class)->authorize($request) ? $next($request) : abort(403);
    }
}
