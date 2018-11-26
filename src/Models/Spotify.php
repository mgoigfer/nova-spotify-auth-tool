<?php

namespace Mgoigfer\SpotifyAuthTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Spotify extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Model Properties
    |--------------------------------------------------------------------------
    */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'spotify';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'key';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'key' => $this->key,
            'value' => $this->value,
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string The route key
     */
    public function getRouteKeyName()
    {
        return 'key';
    }

    /*
    |--------------------------------------------------------------------------
    | Model Static Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get the Spotify user ID.
     *
     * @return string
     */
    public static function userId()
    {
        try {
            return self::where('key', 'user_id')->firstOrFail()->value;
        } catch (ModelNotFoundException $ex) {
            return '';
        }
    }

    /**
     * Get the refresh token.
     *
     * @return string
     */
    public static function refreshToken()
    {
        try {
            return self::where('key', 'refresh_token')->firstOrFail()->value;
        } catch (ModelNotFoundException $ex) {
            return '';
        }
    }
}
