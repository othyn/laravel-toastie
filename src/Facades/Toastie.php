<?php

declare(strict_types=1);

namespace Othyn\Toastie\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Creates Toasties!
 *
 * (the mixin of the concrete class allows for IDE completion!)
 *
 * @mixin \Othyn\Toastie\Services\Toastie
 */
class Toastie extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toastie';
    }
}
