<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Number extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $label = null,
        public ?string $hint = null,
        public ?string $locale = 'en-US',
        public ?int $min = 0,
        public ?int $max = 10,
        public int|string $value = 0,
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
        return view('livewirestack::number');
    }
}
