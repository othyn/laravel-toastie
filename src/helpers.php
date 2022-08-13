<?php

declare(strict_types=1);

use Othyn\Toastie\Services\Toastie;

if (!function_exists('toastie')) {
    function toastie(): Toastie
    {
        return app('toastie');
    }
}
