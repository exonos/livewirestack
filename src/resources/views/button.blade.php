<button id="{{ $uuid }}" wire:loading.attr="data-loading" {{$attributes->merge(['class' => 'relative [&[data-loading]]:pointer-events-none transition-colors rounded '.$getColor(). ' '.$getSize()])}}>
    <div class="[[data-loading]>&]:opacity-0 transition-opacity inline-flex items-center">
        {{$slot}}
    </div>
    <div class="[[data-loading]>&]:opacity-100 opacity-0 absolute inset-0 justify-center inline-flex items-center">
        <span class="loading loading-dots loading-lg"></span>
    </div>
</button>