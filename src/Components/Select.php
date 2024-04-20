<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Exonos\Livewirestack\Components\Builder\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class Select extends Component
{

    public function __construct(
        public Collection|array $options = [],
        public ?array $selectable = [],
        public ?string $select = null
    )
    {
        parent::__construct();
        $this->options();
    }

    public function dimensional(): ?string
    {
        return $this->select === null ? 'false' : 'true';
    }

    public function multiple(): ?string
    {
        return $this->attributes->has('multiple') ? 'true' : 'false';
    }


    public function searchable(): ?string
    {
        return $this->attributes->has('searchable') ? 'true' : 'false';
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
        return view('livewirestack::select');
    }
}
