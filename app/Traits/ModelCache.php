<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ModelCache
{
    // Clear the cache after the model is created, updated, or deleted
    public static function bootModelCache(): void
    {
        if(property_exists(get_called_class(), "cache_key")) {
            $cache_key = self::$cache_key;

            static::created(function() use ($cache_key) {
                Cache::forget($cache_key);
            });

            static::updated(function() use ($cache_key) {
                Cache::forget($cache_key);
            });

            static::deleted(function() use ($cache_key) {
                Cache::forget($cache_key);
            });
        }
    }

    /**
     * Attempt to clear the model's cache as is not possible automatically in this case
     * because the model is not being updated via Eloquent methods (save, update, etc.)
     *
     * @param $model
     * @return void
     */
    public function forceClearCache($model): void
    {
        if(property_exists($model, "cache_key")) {
            Cache::forget($model::$cache_key);
        }
    }
}
