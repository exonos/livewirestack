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
    ) {
        $this->setup();
    }

    private function setup(): void
    {
        $this->uuid = $this->id ?? md5(serialize($this));
    }

    public function getColor()
    {
        $default = 'border focus:ring-4 font-medium rounded-md focus:outline-none ';
        if ($this->attributes->has('primary')) {
            return $default.'text-white bg-blue-700 hover:bg-blue-800 border-transparent focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800';
        }
        if ($this->attributes->has('transparent')) {
            return 'text-gray-500 bg-transparent';
        } elseif ($this->attributes->has('danger')) {
            return $default.'text-white bg-red-500 hover:bg-red-700 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';
        } elseif ($this->attributes->has('info')) {
            return $default.'text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300';
        } elseif ($this->attributes->has('black')) {
            return $default.'text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700';
        } elseif ($this->attributes->has('green')) {
            return $default.'text-white bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        } elseif ($this->attributes->has('yellow')) {
            return $default.'text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300 dark:focus:ring-yellow-900';
        } elseif ($this->attributes->has('purple')) {
            return $default.'text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900';
        } else {
            return $default.'text-gray-500 bg-white border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700';
        }
    }
    public function getSize()
    {
        if ($this->attributes->has('sm')) {
            return 'px-3 py-[6px] text-xs';
        } elseif ($this->attributes->has('md')) {
            return 'px-5 py-2.5 text-sm';
        }elseif ($this->attributes->has('lg')) {
            return 'px-5 py-3 text-base';
        }elseif ($this->attributes->has('xl')) {
            return 'px-6 py-3.5 text-base';
        }else {
            return 'px-3 py-2 text-sm text-xs';
        }
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::button');
    }
}
