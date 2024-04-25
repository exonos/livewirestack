<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Exonos\Livewirestack\Components\Builder\Component;
use Illuminate\Contracts\View\View;

class Phone extends Component
{
    public function entangleable(): ?string
    {
        if ($this->attributes->has('wire:model'))
        {
            return '$wire.entangle("'.$this->attributes->whereStartsWith('wire:model')->first().'")';
        }else{
            return null;
        }
    }
    public function render(): View|Closure|string
    {
        return view('livewirestack::phone');
    }
}
