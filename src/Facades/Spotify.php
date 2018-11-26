<?php

namespace Mgoigfer\SpotifyAuthTool\Facades;

use Illuminate\Support\Facades\Facade;
use Mgoigfer\SpotifyAuthTool\Models\Spotify as SpotifyModel;

class Spotify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SpotifyModel::class;
    }

    /**
     * Get the mockable class for the bound instance.
     *
     * @return string|null
     */
    protected static function getMockableClass()
    {
        return static::getFacadeAccessor();
    }
}
