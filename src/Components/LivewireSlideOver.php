<?php

namespace Exonos\Livewirestack\Components;
use Exonos\Livewirestack\Contracts\BehavesAsSlideOver;

abstract class LivewireSlideOver extends Component implements BehavesAsSlideOver
{
    public function placeholder()
    {
        $view = config('livewirestack.livewire.components.slide-over.placeholder');

        if($view) {
            return view($view);
        }

        return <<<'HTML'
        <form></form>
        HTML;
    }
}
