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
        $default = 'font-medium';
        if ($this->attributes->has('primary')) {
            return $default.' text-white bg-blue-700 hover:bg-blue-800 border-transparent dark:bg-blue-600 dark:hover:bg-blue-700';
        }
        if ($this->attributes->has('transparent')) {
            return ' text-gray-500 bg-transparent';
        } elseif ($this->attributes->has('danger')) {
            return $default.' text-white bg-red-500 hover:bg-red-700 text-white dark:bg-red-600 dark:hover:bg-red-700';
        } elseif ($this->attributes->has('info')) {
            return $default.' text-white bg-blue-600 hover:bg-blue-700';
        } elseif ($this->attributes->has('black')) {
            return $default.' text-white bg-gray-800 hover:bg-gray-900 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-gray-700';
        } elseif ($this->attributes->has('green')) {
            return $default.' text-white bg-green-700 hover:bg-green-800 dark:bg-green-600 dark:hover:bg-green-700';
        } elseif ($this->attributes->has('yellow')) {
            return $default.' text-white bg-yellow-500 hover:bg-yellow-600';
        } elseif ($this->attributes->has('purple')) {
            return $default.' text-white bg-purple-700 hover:bg-purple-800 dark:bg-purple-600 dark:hover:bg-purple-700';
        } else {
            return $default.' text-gray-800 bg-gray-100 hover:bg-gray-200';
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
