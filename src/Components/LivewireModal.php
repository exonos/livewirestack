<?php

namespace Exonos\Livewirestack\Components;

use Exonos\Livewirestack\Contracts\BehavesAsModal;

abstract class LivewireModal extends Component implements BehavesAsModal
{
    public function placeholder()
    {
        $view = config('livewirestack.livewire.components.modal.placeholder');

        if($view) {
            return view($view);
        }

        return <<<'HTML'
        <form></form>
        HTML;
    }
}
