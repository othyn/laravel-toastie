<?php

declare(strict_types=1);

namespace Othyn\Toastie\Views\Components;

use Othyn\Toastie\Enums\ToastieType;

class Success extends ToastieComponent
{
    /**
     * This component represents the success toastie type.
     */
    protected static function representsToastieType(): ToastieType
    {
        return ToastieType::SUCCESS;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('toastie::components.success');
    }
}
