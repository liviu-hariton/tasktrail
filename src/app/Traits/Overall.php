<?php

namespace App\Traits;

use App\Enums\PerPageOptions;
use Illuminate\Support\Facades\File;

trait Overall
{
    /**
     * Load all available Javascript language files
     */
    public function loadJavascriptLanguageFiles(): array
    {
        $locale = str_replace('_', '-', app()->getLocale());

        $lang_path = public_path("assets/js/lang/".$locale);

        $js_lang_files = [];

        if(File::exists($lang_path)) {
            $js_lang_files = File::files($lang_path);
        }

        return $js_lang_files;
    }

    /**
     * Get the available per page options
     *
     * @return array
     */
    public function getPerPageOptions(): array
    {
        $options = [];

        foreach(PerPageOptions::cases() as $variant) {
            if(session('per_page')) {
                $is_current = session('per_page') == $variant->value;
            } else {
                $is_current = _ttrs('per_page') == $variant->value;
            }

            $options[] = [
                'number' => $variant->value,
                'is_current' => $is_current
            ];

        }

        return $options;
    }

    public function getPerPageOption()
    {
        return session('per_page') ? session('per_page') : _ttrs('per_page');
    }
}
