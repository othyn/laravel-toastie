<?php

declare(strict_types=1);

namespace Othyn\Toastie\Tests\Feature;

use Illuminate\Support\Facades\File;
use Othyn\Toastie\Tests\ToastieTestCase;

it('can publish the package config', function () {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $publishedToastieConfigFile = config_path('toastie.php');

    if (File::exists($publishedToastieConfigFile)) {
        File::delete($publishedToastieConfigFile);
    }

    $this->assertFileDoesNotExist($publishedToastieConfigFile);

    $this->artisan('vendor:publish', [
        '--provider' => 'Othyn\\Toastie\\Providers\\ToastieServiceProvider',
        '--tag'      => 'toastie-config',
    ])
    ->assertSuccessful();

    $this->assertFileExists($publishedToastieConfigFile);
});

it('can publish the package views', function () {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $publishedToastieViewDirectory = resource_path('views/vendor/toastie');

    if (File::isDirectory($publishedToastieViewDirectory)) {
        File::deleteDirectory($publishedToastieViewDirectory);
    }

    $this->assertDirectoryDoesNotExist($publishedToastieViewDirectory);

    $this->artisan('vendor:publish', [
        '--provider' => 'Othyn\\Toastie\\Providers\\ToastieServiceProvider',
        '--tag'      => 'toastie-views',
    ])
    ->assertSuccessful();

    $this->assertDirectoryExists($publishedToastieViewDirectory);

    $this->assertFileExists("{$publishedToastieViewDirectory}/components/error.blade.php");
    $this->assertFileExists("{$publishedToastieViewDirectory}/components/info.blade.php");
    $this->assertFileExists("{$publishedToastieViewDirectory}/components/shared.blade.php");
    $this->assertFileExists("{$publishedToastieViewDirectory}/components/stack.blade.php");
    $this->assertFileExists("{$publishedToastieViewDirectory}/components/success.blade.php");
    $this->assertFileExists("{$publishedToastieViewDirectory}/components/warning.blade.php");
});
