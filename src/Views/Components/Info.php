<?php

declare(strict_types=1);

namespace Othyn\Toastie\Views\Components;

use Othyn\Toastie\Enums\ToastieType;

class Info extends ToastieComponent
{
    /**
     * This component represents the info toastie type.
     */
    protected static function representsToastieType(): ToastieType
    {
        return ToastieType::INFO;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('toastie::components.info');
    }
}
