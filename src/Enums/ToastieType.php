<?php

declare(strict_types=1);

namespace Othyn\Toastie\Enums;

enum ToastieType: string
{
    case SUCCESS = 'Success';
    case INFO    = 'Info';
    case WARNING = 'Warning';
    case ERROR   = 'Error';

    case SHARED = 'Shared';

    /**
     * Gets the paired colour for the given toastie type.
     */
    public function colour(): string
    {
        return ToastieTypeColour::for(toastType: $this)->value;
    }

    /**
     * Gets the paired icon for the given toastie type.
     */
    public function icon(): string
    {
        return ToastieTypeIcon::for(toastType: $this)->value;
    }
}
