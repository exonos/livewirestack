<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Exonos\Livewirestack\Components\Builder\Component;

class Password extends Component
{
    public function __construct()
    {
        parent::__construct();

        $this->size = config('livewirestack.theme.password.size', 'sm');
        $this->variant = config('livewirestack.theme.password.theme', 'flat');
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
