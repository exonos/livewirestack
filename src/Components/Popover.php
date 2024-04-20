<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Popover extends Component
{
    public string $uuid;
    public string $alignmentClasses;
    public string $widthClasses;

    public function __construct(
        public ?string $align = 'right',
        public ?string $width = '48',
        public ?string $contentClasses = 'bg-white dark:bg-gray-950',
        public ?string $dropdownClasses = 'bg-white dark:bg-gray-950',
        public ?bool $withClasses = true,
    ) {
        $this->setup();
    }

    protected function setup()
    {
        $this->uuid = md5(serialize($this));

        $this->alignmentClasses = match ($this->align) {
            'left' => 'origin-top-left left-0',
            'top' => 'origin-top',
            'none', 'false' => '',
            'bottom-right' => 'left-20 bottom-0 ',
            'bottom' => 'bottom-0 ',
            default => 'origin-top-right right-0',
        };

        $this->widthClasses = match ($this->align) {
            '64' => 'w-64',
            'max' => 'w-max',
            default => 'w-48',
        };
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
        return view('livewirestack::popover');
    }
}
