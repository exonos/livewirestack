<?php

namespace Exonos\Livewirestack\Components;

use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;

class Svg extends Component
{

    public function __construct(
        public string $name,
        public ?string $variant = null,
        public bool $solid = false,
        public bool $outline = false,
        public bool $mini = false,
    ) {

    }

    public function render(): View|Factory
    {
        return view("livewirestack::{$this->name}");
    }
}
