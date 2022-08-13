<?php

declare(strict_types=1);

return [
    'timings' => [
        /*
         * Whether the toasts should automatically close after a specified time.
         *
         * This time can be specified by setting the 'timings.dismiss_delay' value.
         */
        'auto_dismiss' => env('TOASTIE_AUTO_DISMISS', true),

        /*
         * Time, in seconds, that the toast should take to be dismissed when dismissing automatically.
         *
         * REQUIRES the 'timings.auto_dismiss' setting to be enabled.
         */
        'dismiss_delay' => env('TOASTIE_DISMISS_DELAY', 4),
    ],
];
