<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class DatetimePicker extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $label = null,
        public ?string $hint = null,
        public ?bool $multiple = false,
        public ?bool $searchable = false,
        public Collection|array $options = [],
        public ?array $selectable = [],
        public ?string $select = null,
        public ?string $locale = 'en-US',

    ) {
        $this->uuid = md5(serialize($this));
        $this->options();
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

    private function options(): void
    {
        if (! $this->select || (filled($this->options) && ! is_array($this->options[0]))) {
            return;
        }

        $select = explode('|', $this->select);
        $label = explode(':', $select[0])[1];
        $value = explode(':', $select[1])[1];

        $this->options = collect($this->options)->map(fn (array $item) => [$label => $item[$label], $value => $item[$value]])->toArray();

        $this->selectable = [
            'label' => $label,
            'value' => $value,
        ];
    }
    public function render(): View|Closure|string
    {
        return view('livewirestack::datepicker');
    }
}
