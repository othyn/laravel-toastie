<?php

declare(strict_types=1);

namespace Othyn\Toastie\Enums;

enum ToastieTypeColour: string
{
    case GREEN  = 'green';
    case PURPLE = 'purple';
    case YELLOW = 'yellow';
    case RED    = 'red';
    case WHITE  = 'white';

    /**
     * Gets the paired colour for the given toastie type.
     *
     * I really wish PHP allowed multiple methods with the same name but different signatures like Swift...
     * It makes for really clean interfaces!
     */
    public static function for(ToastieType $toastType): static
    {
        return match ($toastType) {
            ToastieType::SUCCESS => static::GREEN,
            ToastieType::INFO    => static::PURPLE,
            ToastieType::WARNING => static::YELLOW,
            ToastieType::ERROR   => static::RED,
            ToastieType::SHARED  => static::WHITE,
        };
    }
}
