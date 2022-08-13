<?php

declare(strict_types=1);

namespace Othyn\Toastie\Views\Components;

use Illuminate\View\Component;
use Othyn\Toastie\Enums\ToastieType;
use Othyn\Toastie\Services\Toastie;

abstract class ToastieComponent extends Component
{
    /**
     * Whether any toastie should be displayed.
     */
    public bool $aToastieShouldBeDisplayed = false;

    /**
     * Whether the toastie should be displayed.
     */
    public bool $shouldBeDisplayed = false;

    /**
     * The toastie type.
     */
    public ?ToastieType $type = null;

    /**
     * The toastie message.
     */
    public ?string $message = null;

    /**
     * Whether the toastie should auto dismiss.
     */
    public bool $shouldAutoDismiss = true;

    /**
     * Time, in seconds, that the toastie should take to be dismissed when dismissing automatically.
     */
    public int $autoDismissInSeconds = 4;

    /**
     * Time, in milliseconds, that the toastie should take to be dismissed when dismissing automatically.
     */
    public int $autoDismissInMilliseconds = 4_000;

    /**
     * Get the party started.
     */
    public function __construct()
    {
        $this->aToastieShouldBeDisplayed = session()->has(Toastie::TOAST_TYPE_SESSION_KEY) && session()->has(Toastie::TOAST_MESSAGE_SESSION_KEY);

        $this->type    = session()->get(Toastie::TOAST_TYPE_SESSION_KEY);
        $this->message = session()->get(Toastie::TOAST_MESSAGE_SESSION_KEY);

        $this->shouldBeDisplayed = $this->aToastieShouldBeDisplayed && $this->type === static::representsToastieType();

        $this->shouldAutoDismiss = config('toastie.timings.auto_dismiss', true);

        $this->autoDismissInSeconds      = config('toastie.timings.dismiss_delay', 4);
        $this->autoDismissInMilliseconds = 1_000 * $this->autoDismissInSeconds;
    }

    /**
     * The toastie type that the component represents.
     */
    abstract protected static function representsToastieType(): ToastieType;
}
