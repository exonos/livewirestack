<?php

namespace Exonos\Livewirestack\Traits;

use Exonos\Livewirestack\Contracts\TabForm;

trait BelongsToLivewire
{
    protected TabForm $livewire;

    public function setLivewire(TabForm $livewire): static
    {
        $this->livewire = $livewire;

        return $this;
    }

    public function getLivewire(): TabForm
    {
        return $this->livewire;
    }
}