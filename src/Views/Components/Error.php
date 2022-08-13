<?php

declare(strict_types=1);

namespace Othyn\Toastie\Views\Components;

use Illuminate\Contracts\View\View;
use Othyn\Toastie\Enums\ToastieType;

class Error extends ToastieComponent
{
    /**
     * This component represents the error toastie type.
     */
    protected static function representsToastieType(): ToastieType
    {
        return ToastieType::ERROR;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('toastie::components.error');
    }
}
