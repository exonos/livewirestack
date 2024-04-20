<div x-data>
    <div x-on:click="$refs.popover.toggle" class="cursor-pointer">
        {{ $trigger }}
    </div>
    <div x-ref="popover" @keydown.escape.window="$refs.popover.close" x-float.flip.offset="true" x-cloak class="absolute bg-white border shadow-sm border-neutral-200/70 rounded-md overflow-auto w-auto max-w-lg z-50 -translate-x-1/2 left-1/2">

        @if(isset($content))
            {{$content}}
        @else
            {{$slot}}
        @endif
    </div>
</div>