<?php

declare(strict_types=1);

namespace Othyn\Toastie\Tests\Feature;

use Othyn\Toastie\Tests\ToastieTestCase;
use Pest\Datasets;

/*
 * Helpful resources:
 * - https://www.csrhymes.com/2021/06/16/testing-blade-components.html
 */

it('renders as the component', function ($expectedType) {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $expectedMessage = fake()->sentence;

    toastie()->{$expectedType}($expectedMessage);

    $view = $this->blade("<x-toastie::{$expectedType} />");

    $view->assertSee("aria-label=\"{$expectedType}\"", false);
    $view->assertSee($expectedMessage);
})
->with('renderable_components');

it('renders the shared component as the component', function ($expectedType) {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $expectedMessage = fake()->sentence;

    toastie()->{$expectedType}($expectedMessage);

    $view = $this->blade('<x-toastie::shared />');

    $view->assertDontSee('aria-label="shared"', false);
    $view->assertSee("aria-label=\"{$expectedType}\"", false);
    $view->assertSee($expectedMessage);
})
->with('renderable_components');

it('only renders from the stack component as the component', function ($expectedType) {
    // Had to enable no_blank_lines_after_phpdoc for this, ew.
    /** @var ToastieTestCase $this */

    $expectedMessage = fake()->sentence;

    toastie()->{$expectedType}($expectedMessage);

    $view = $this->blade('<x-toastie::stack />');

    $otherNames = Datasets::get('renderable_components');

    if (is_array($otherNames)) {
        foreach ($otherNames as $otherName) {
            if ($otherName === $expectedType) {
                continue;
            }

            $view->assertDontSee("aria-label=\"{$otherName}\"", false);
        }
    } else {
        $this->assertTrue(false, 'Cannot check other renderable components');
    }

    $view->assertSee("aria-label=\"{$expectedType}\"", false);
    $view->assertSee($expectedMessage);
})
->with('renderable_components');
