<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Wizard extends Component
{
    public string $uuid;
    public array $steps;

    public function __construct(

    ) {
        $this->uuid = md5(serialize($this));
        $this->steps = [
            [
                'title'=> 'Paso 1',
                'is_complete'=> false,
                'is_applicable' =>true,
                'errors'=> json_encode([])
            ],
            [
                'title'=> 'Paso 2',
                'is_complete'=> false,
                'is_applicable' =>true,
                'errors'=> json_encode([])
            ],
        ];
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
        return view('livewirestack::wizard');
    }
}
