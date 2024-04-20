<?php

namespace Exonos\Livewirestack\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Lottie extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $path = null,
        public ?string $actions = null,
        public ?bool $autoplay = true,
        public ?bool $loop = false,
    ) {
        $this->uuid = md5(serialize($this));
    }

    public function render(): View|Closure|string
    {
        return view('livewirestack::lottie',[
            'uuid'      => $this->uuid,
            'animType' => $attributes['animType'] ?? 'svg',
            'loop'     => filter_var($this->loop ?? true, FILTER_VALIDATE_BOOLEAN),
            'autoplay' => filter_var($this->autoplay ?? true, FILTER_VALIDATE_BOOLEAN),
            'data'     => $attributes['data'] ?? null,
            'path'     => $this->path,
            'class'    => $attributes['class'] ?? "",
            'style'    => $attributes['style'] ?? ""
        ]);
    }
}
