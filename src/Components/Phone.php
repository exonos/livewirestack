<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Exonos\Livewirestack\Components\Builder\Component;
use Illuminate\Contracts\View\View;

class Phone extends Component
{
    public function render(): View|Closure|string
    {
        return view('livewirestack::phone');
    }
}
