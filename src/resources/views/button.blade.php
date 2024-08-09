<button id="{{ $uuid }}" wire:loading.class="opacity-50 pointer-events-none" wire:loading.attr="disabled" {{$attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 transition-colors focus:outline-none h-7 text-base px-2 rounded '.$getColor(). ' '.$getSize()])}}>
    {{$slot}}
</button>
