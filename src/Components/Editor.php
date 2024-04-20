<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Exonos\Livewirestack\Components\Builder\Component;
use Illuminate\Contracts\View\View;

class Editor extends Component
{
    public function render(): View|Closure|string
    {
        return view('livewirestack::editor');
    }
}
