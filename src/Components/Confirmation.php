<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class Confirmation extends Component
{
    public function render(): View|Closure|string
    {
        return view('livewirestack::confirmation');
    }
}
