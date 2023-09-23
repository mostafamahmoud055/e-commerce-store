<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class Nav extends Component
{
    protected $items;
    protected $active;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = config('nav');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.nav',
            [
                'items' => $this->items,
            ]
        );
    }
}
