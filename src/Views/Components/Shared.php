<?php

declare(strict_types=1);

namespace Othyn\Toastie\Views\Components;

use Othyn\Toastie\Enums\ToastieType;

class Shared extends ToastieComponent
{
    /**
     * The colour class for the shared toastie type to use.
     */
    public string $colour;

    /**
     * The icon SVG path for the shared toastie type to use.
     */
    public string $icon;

    /**
     * This component represents the shared toastie type.
     */
    protected static function representsToastieType(): ToastieType
    {
        return ToastieType::SHARED;
    }

    /**
     * Get the party started.
     */
    public function __construct()
    {
        parent::__construct();

        $this->shouldBeDisplayed = $this->aToastieShouldBeDisplayed;

        $this->colour = $this->shouldBeDisplayed ? $this->type->colour() : static::representsToastieType()->colour();
        $this->icon   = $this->shouldBeDisplayed ? $this->type->icon() : static::representsToastieType()->icon();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('toastie::components.shared');
    }
}
