<button id="{{ $uuid }}"
   wire:loading.class="opacity-50 pointer-events-none"
   wire:loading.attr="disabled"
   {{$attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 transition-colors focus:outline-none text-base rounded '.$getColor(). ' '.$getSize()])}}
>
    {{$slot}}
</button>
