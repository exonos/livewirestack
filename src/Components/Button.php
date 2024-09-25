<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $target = null,
        public ?string $id = null,
        public ?string $method = null,
        public ?string $locale = 'en-US',
        public ?string $variant = null,
    ) {
        $this->setup();
    }

    private function setup(): void
    {
        $this->uuid = $this->id ?? md5(serialize($this));
        $this->variant = config('livewirestack.theme.button.variant_classes.default');
    }

    public function getColor()
    {
        $default = 'font-medium';
        $colors = config('livewirestack.theme.button.variant_classes', 'sm');

        foreach ($colors as $key => $class) {
            if ($this->attributes->has($key)) {
                return $default . ' ' . $class;
            }
            return $colors[config('livewirestack.theme.button.variant_classes.default')];
        }

        return $default . ' text-gray-800';
    }
    public function getSize()
    {
        $sizes = config('livewirestack.theme.button.size', 'sm');

        foreach ($sizes as $key => $class) {
            if ($this->attributes->has($key)) {
                return $class;
            }
        }

        return 'px-3 py-2 text-sm text-xs';
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::button');
    }
}
