<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;
use Illuminate\View\ComponentSlot;
use Livewire\WireDirective;

class Toggle extends Component
{
    public string $uuid;
    public function __construct(
        public string|null|ComponentSlot $label = null,
        public ?string $md = null,
        public ?string $lg = null,
        public string $size = 'lg',
        public ?string $position = 'right',
        public ?string $color = 'blue',
    ) {
        $this->setup();
    }

    private function setup(): void
    {
        $this->uuid = $this->id ?? md5(serialize($this));
        $this->size = $this->md ? 'md' : 'lg';
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::toggle');
    }

    /**
     * @throws Exception
     */
    public function entangle(): string
    {
        if (($wire = $this->wire()) === null) {
            return Blade::render('null');
        }

        $property = $wire->value();

        return $wire->hasModifier('live') || $wire->hasModifier('blur')
            ? Blade::render("@entangle('{$property}').live")
            : Blade::render("@entangle('{$property}')");
    }

    public function wire(): ?WireDirective
    {
        if (! $this->attributes) {
            throw new Exception('The attributes was not defined.');
        }

        // For some unknown reason the macros are not defined when we are testing.
        // I assume this happens because Laravel doesn't bootstrap something necessary
        // To the macro works when we are testing using the `$this->blade()` method.
        if (! $this->attributes::hasMacro('wire')) {
            return null;
        }

        /** @var WireDirective $wire */
        $wire = $this->attributes->wire('model');

        if (! $wire->directive() && ! $wire->value()) {
            return null;
        }

        return $wire;
    }
}
