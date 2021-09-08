<?php

namespace App\Helpers;

use App\Models\Setting;

class Settings
{
    public static function get(string $key): ?string
    {
        return Setting::where('key', $key)->value('value');;
    }

    public static function save(string $key, string $value): string
    {
        return Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
    
}
