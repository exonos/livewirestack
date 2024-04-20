<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentSlot;

class Tooltip extends Component
{
    public function __construct(
        public ?string $tooltipPosition = 'top',
        public ?string $tooltipArrow = 'true',
        public string|null|ComponentSlot $label = null,
        public string|null|ComponentSlot $trigger = null,
    ) {

    }
    public function render(): View|Closure|string
    {
        return view('livewirestack::tooltip');
    }
}
