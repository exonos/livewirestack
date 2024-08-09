<?php

namespace Exonos\Livewirestack\Foundation;
use Exonos\Livewirestack\Contracts\BehavesAsSlideOver;

final class SlideOver extends Base implements BehavesAsSlideOver
{
    public function getListeners(): array
    {
        return [
            'slide-over.open' => 'registerAndActivateComponent',
        ];
    }
}
