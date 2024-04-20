<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Password extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $label = null,
        public ?string $icon = null,
        public ?string $iconRight = null,
        public ?string $hint = null,
        public ?string $prefix = null,
        public ?string $suffix = null,
        public ?bool $inline = false,
        public ?bool $money = false,
        public ?string $locale = 'en-US',

        // Slots
        public mixed $prepend = null,
        public mixed $append = null
    ) {
        $this->uuid = md5(serialize($this));
    }

    public function modelName(): ?string
    {
        if ($this->attributes->has('wire:model'))
        {
            return $this->attributes->whereStartsWith('wire:model')->first();
        }else{
            return $this->attributes->whereStartsWith('name')->first();
        }
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::password');
    }
}
