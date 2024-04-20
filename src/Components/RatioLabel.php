<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatioLabel extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $label = null,
        public string|int|null $keyOption = null,
        public string|int|null $valueOption = null,
        public ?string $hint = null,
        public ?array $options,
        public ?string $columns = '3',
        public ?int $showing = 3,
        public ?string $locale = 'en-US',
        public ?bool $multiple = false,
    ) {
        $this->uuid = md5(serialize($this));
    }

    public function modelName(): ?string
    {
        if ($this->attributes->has('wire:model'))
        {
            return $this->attributes->whereStartsWith('wire:model')->first();
        }
        elseif ($this->attributes->has('wire:model.live'))
        {
            return $this->attributes->whereStartsWith('wire:model.live')->first();
        }else{
            return $this->attributes->whereStartsWith('name')->first();
        }
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::ratio-labels');
    }
}
