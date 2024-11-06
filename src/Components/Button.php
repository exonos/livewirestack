<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $uuid;
    public ?string $variant;
    public ?string $size;

    public function __construct(
        public ?string $target = null,
        public ?string $id = null,
        public ?string $method = null,
        public ?string $locale = 'en-US',
        ?string $variant = null,
        ?string $size = null,
    ) {
        $this->variant = $variant ?? config('livewirestack.theme.button.variant_classes.default', 'black');
        $this->size = $size ?? config('livewirestack.theme.button.size.default', 'sm');
        $this->setup();
    }

    private function setup(): void
    {
        $this->uuid = $this->id ?? md5(serialize($this));
    }

    public function getColor(): string
    {
        $default = 'font-medium';
        $colors = config('livewirestack.theme.button.variant_classes');

        $variantClass = $colors[$this->variant] ?? $colors[config('livewirestack.theme.button.variant_classes.default', 'black')];

        return $default . ' ' . $variantClass;
    }

    public function getSize(): string
    {
        $sizes = config('livewirestack.theme.button.size');

        $sizeClass = $sizes[$this->size] ?? $sizes[config('livewirestack.theme.button.size.default', 'sm')];

        return $sizeClass;
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::button');
    }
}
