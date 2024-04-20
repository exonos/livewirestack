<div x-data="{ open: false }" class="relative" @click.away="open = false" @close.stop="open = false">
    <div x-on:click="open = ! open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            @click.away="open = false"
            x-cloak
            class="absolute z-50 mt-2 {{ $widthClasses }} rounded-md shadow-lg {{ $alignmentClasses }} {{ $dropdownClasses }}"
    >
        <div class="@if($withClasses) rounded-md ring-1 ring-black ring-opacity-5  {{ $contentClasses }} @endif" @click.stop style="z-index: 999">
            @if(isset($content))
                {{$content}}
            @else
                {{ $slot }}
            @endif
        </div>
    </div>
</div>