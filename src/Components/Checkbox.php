<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentSlot;

class Checkbox extends Component
{
    public string $uuid;

    public function __construct(
        public string|null|ComponentSlot $label = null,
        public ?string $id = null,
    ) {
        $this->setup();
    }

    private function setup(): void
    {
        $this->uuid = $this->id ?? md5(serialize($this));
    }

    public function getColor()
    {
        $colors = [
            'primary' => 'text-primary focus:ring-primary dark:focus:ring-primary',
            'danger' => 'text-red-500 focus:ring-red-500 dark:focus:ring-red-600',
            'info' => 'text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600',
            'black' => 'text-black focus:ring-black dark:focus:ring-black',
            'green' => 'text-green-600 focus:ring-green-500 dark:focus:ring-green-600',
            'yellow' => 'text-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600',
            'purple' => 'text-purple-600 focus:ring-purple-500 dark:focus:ring-purple-600',
        ];

        foreach ($colors as $key => $value) {
            if ($this->attributes->has($key)) {
                return 'font-medium ' . $value;
            }
        }

        return 'font-medium text-primary focus:ring-primary dark:focus:ring-primary';
    }
    public function getSize()
    {
        if ($this->attributes->has('sm')) {
            return 'text-xs h-3 w-3';
        } elseif ($this->attributes->has('md')) {
            return 'text-sm h-4 w-4';
        }elseif ($this->attributes->has('lg')) {
            return 'text-md h-5 w-5';
        }elseif ($this->attributes->has('xl')) {
            return 'text-lg h-6 w-6';
        }else {
            return 'h-4 w-4';
        }
    }

    public function textSize()
    {
        if ($this->attributes->has('sm')) {
            return 'text-xs';
        } elseif ($this->attributes->has('md')) {
            return 'text-sm';
        }elseif ($this->attributes->has('lg')) {
            return 'text-md';
        }elseif ($this->attributes->has('xl')) {
            return 'text-lg';
        }else {
            return 'text-md';
        }
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::checkbox');
    }
}
