<?php

declare(strict_types=1);

namespace Othyn\Toastie\Views\Components;

use Illuminate\View\Component;

class Stack extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('toastie::components.stack');
    }
}
