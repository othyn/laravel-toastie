<?php

declare(strict_types=1);

namespace Othyn\Toastie\Tests\Feature;

use Illuminate\Support\Str;
use Othyn\Toastie\Enums\ToastieType;
use Othyn\Toastie\Facades\Toastie as FacadesToastie;
use Othyn\Toastie\Services\Toastie as ServicesToastie;
use Othyn\Toastie\Tests\ToastieTestCase;

it('registers a new toastie via the class', function ($expectedType) {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $expectedMessage = fake()->sentence;

    $toastie = new ServicesToastie();
    $toastie->{$expectedType}($expectedMessage);

    $this->assertTrue(session()->has('toastie.type'));
    $this->assertTrue(session()->has('toastie.message'));

    /** @var ToastieType */
    $actualType = session()->get('toastie.type');
    $this->assertEquals($expectedType, Str::lower($actualType->value));

    $actualMessage = session()->get('toastie.message');
    $this->assertEquals($expectedMessage, $actualMessage);
})
->with('renderable_components');

it('registers a new toastie via the helper method', function ($expectedType) {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $expectedMessage = fake()->sentence;

    toastie()->{$expectedType}($expectedMessage);

    $this->assertTrue(session()->has('toastie.type'));
    $this->assertTrue(session()->has('toastie.message'));

    /** @var ToastieType */
    $actualType = session()->get('toastie.type');
    $this->assertEquals($expectedType, Str::lower($actualType->value));

    $actualMessage = session()->get('toastie.message');
    $this->assertEquals($expectedMessage, $actualMessage);
})
->with('renderable_components');

it('registers a new toastie via the facade', function ($expectedType) {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $expectedMessage = fake()->sentence;

    FacadesToastie::shouldReceive($expectedType)
        ->once()
        ->andReturn();

    FacadesToastie::{$expectedType}($expectedMessage);
})
->with('renderable_components');
