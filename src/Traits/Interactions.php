<?php

namespace Exonos\Livewirestack\Traits;

use Exonos\Livewirestack\Components\Notification;
use Livewire\Component;

trait Interactions
{
    public function notification(): Notification
    {
        /** @var Component $this */
        return new Notification($this);
    }
}
