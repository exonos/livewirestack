<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentSlot;
class Modal extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $id = null,
        public ?bool $show = false,
        public string|null|ComponentSlot $trigger = null,
        public string|null|ComponentSlot $content = null,
        public string $size = 'lg',
    ) {
        $this->setup();
    }

    private function setup(): void
    {
        $this->uuid = $this->id ?? md5(serialize($this));
        $this->size = [
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-md md:max-w-lg',
            'xl' => 'sm:max-w-md md:max-w-xl',
            '2xl' => 'sm:max-w-md md:max-w-xl lg:max-w-2xl',
            '3xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl',
            '4xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-4xl',
            '5xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl',
            '6xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-6xl',
            '7xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl',
        ][$this->size]?? 'sm:max-w-md md:max-w-xl lg:max-w-2xl';
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

    public function fixed(): ?string
    {
        return $this->attributes->has('non-fixed') ? 'false' : 'true';
    }

    public function entangleable(): ?string
    {
        if ($this->attributes->has('wire:model'))
        {
            return '$wire.entangle("'.$this->attributes->whereStartsWith('wire:model')->first().'")';
        }else{
            return $this->attributes->whereStartsWith('show')->first();
        }
    }
    public function render(): View|Closure|string
    {
        return view('livewirestack::modal');
    }
}
