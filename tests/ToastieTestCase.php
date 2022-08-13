<?php

declare(strict_types=1);

namespace Othyn\Toastie\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase;
use Othyn\Toastie\Providers\ToastieServiceProvider;

class ToastieTestCase extends TestCase
{
    use InteractsWithViews;
    use InteractsWithSession;

    protected function getPackageProviders($app): array
    {
        return [
            ToastieServiceProvider::class,
        ];
    }
}
