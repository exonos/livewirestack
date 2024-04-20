<?php

namespace Exonos\Livewirestack\Components\Builder;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\Contracts\View\View;

class Container implements Htmlable
{
    private array $forms;

    public function __construct($forms)
    {
        $this->forms = $forms;
    }

    public static function make($component): self
    {
        $formBuilders = $component->getForm();
        $forms = [];
        /**
         * @var $formBuilders Component[]
         */
        foreach ($formBuilders as $builder) {
            $forms[] = $builder;
        }
        return new self($forms);
    }

    public function toHtml(): Factory|View|string|Application
    {
        return $this->render();
    }

    public function render(): Factory|View|Application
    {
        return view('livewirestack::container', [
            'forms' => $this->forms,
        ]);
    }
}
