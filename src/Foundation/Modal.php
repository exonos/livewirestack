<?php

namespace Exonos\Livewirestack\Foundation;

use Exonos\Livewirestack\Foundation;
use Exonos\Livewirestack\Contracts\BehavesAsModal;

class Modal extends Foundation\Base implements BehavesAsModal
{
    public function getListeners(): array
    {
        return [
            'modal.open' => 'registerAndActivateComponent',
        ];
    }
}
