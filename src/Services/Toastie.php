<?php

declare(strict_types=1);

namespace Othyn\Toastie\Services;

use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Othyn\Toastie\Enums\ToastieType;

class Toastie
{
    public const TOAST_TYPE_SESSION_KEY    = 'toastie.type';
    public const TOAST_MESSAGE_SESSION_KEY = 'toastie.message';

    /**
     * Fires a given toastie into the session flash storage.
     */
    private function flash(ToastieType $type, string $message): void
    {
        $session = session();

        if ($session instanceof Store || $session instanceof SessionManager) {
            $session->now(Toastie::TOAST_TYPE_SESSION_KEY, $type);
            $session->now(Toastie::TOAST_MESSAGE_SESSION_KEY, $message);
        }
    }

    /**
     * Displays a success toastie on the next request cycle.
     */
    public function success(string $message): void
    {
        $this->flash(ToastieType::SUCCESS, $message);
    }

    /**
     * Displays a info toastie on the next request cycle.
     */
    public function info(string $message): void
    {
        $this->flash(ToastieType::INFO, $message);
    }

    /**
     * Displays a warning toastie on the next request cycle.
     */
    public function warning(string $message): void
    {
        $this->flash(ToastieType::WARNING, $message);
    }

    /**
     * Displays a error toastie on the next request cycle.
     */
    public function error(string $message): void
    {
        $this->flash(ToastieType::ERROR, $message);
    }
}
