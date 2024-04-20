<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class File extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $label = null,
        public $file = null,
        public ?string $mode = 'attachment',
        public ?string $profileClass = 'w-20 h-20 rounded-full',
        public ?string $accept = 'image/jpg,image/jpeg,image/png,application/pdf',
    ) {
        $this->uuid = md5(Str::random(6));
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

    public function entangleable(): ?string
    {
        if ($this->attributes->has('wire:model'))
        {
            return '$wire.entangle("'.$this->modelName().'")';
        }else{
            return '""';
        }
    }

    public function multiple(): ?string
    {
        return $this->attributes->has('multiple') ? 'true' : 'false';
    }


    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::file');
    }
}
