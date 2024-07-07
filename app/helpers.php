<?php

use App\Http\Controllers\Backend\AdminProfileController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

if(!function_exists('_ttrs')) {
    /**
     * Return a site specific setting value from the config
     *
     * @param string $key
     * @return string|null
     */
    function _ttrs(string $key): string|null
    {
        return config('_ttrs')->$key ?? null;
    }
}

if(!function_exists('menuItemActive')) {
    /**
     * Check if the current route matches any of the given route items
     * and return true if there's a match.
     *
     * @param array $routes array of routes names to compare against the current route
     * @return bool
     */
    function menuItemActive(array $routes): bool
    {
        foreach($routes as $route) {
            if(request()->routeIs($route)) {
                return true;
            }
        }

        return false;
    }
}

if(!function_exists('tnrAlert')) {
    /**
     * Return a formatted alert message
     *
     * @param string $message
     * @param string $type possible values:
     *                     <br />[bootstrap standard]: primary, secondary, success, danger, warning, info, light
     *                     <br />[custom]: dark, pink, purple, indigo, teal, yellow
     * @param string $icon icons from https://icons.getbootstrap.com/
     * @param bool $dismissible
     * @param bool $outlined
     * @return \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    function tnrAlert(
        string $message = '',
        string $type = 'success',
        string $icon = 'bi-check-square-fill',
        bool $dismissible = false,
        bool $rounded = false,
        bool $bordered = false
    ): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('components.general.alert', [
            'message' => $message,
            'type' => $type,
            'icon' => $icon,
            'dismissible' => $dismissible,
            'rounded' => $rounded,
            'bordered' => $bordered,
        ]);
    }
}

if(!function_exists('consecutiveNumbers')) {
    /**
     * Return an array of consecutive numbers from $min to $max
     *
     * @param int $min
     * @param int $max
     * @param int $step
     * @return array
     */
    function consecutiveNumbers(int $min, int $max, int $step = 1): array
    {
        $numbers = [];

        foreach(range($min, $max, $step) as $number) {
            $numbers[] = $number;
        }

        return $numbers;
    }
}

if(!function_exists('cleanOutput')) {
    /**
     * Sanitize and prepare a given input string for safe display in HTML
     *
     * @param $input
     * @return string
     */
    function cleanOutput($input): string
    {
        // Escape special characters in the input
        $output = htmlspecialchars($input, ENT_QUOTES);

        // Split the output into words
        $words = explode(" ", $output);

        // Check if any word exceeds 200 characters
        $allow = true;

        foreach($words as $word) {
            if(strlen($word) > 200) {
                // If a long word is found, disallow it and exit the loop
                $allow = false;
                break;
            }
        }

        return $allow ? stripslashes($output) : '';
    }
}
