<div class="flex items-center">
    <input id="{{ $uuid }}" type="checkbox" value="" {{$attributes->merge(['class' => 'bg-gray-100 border-gray-300 rounded dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 '.$getColor(). ' '.$getSize()])}}>
    @if ($label instanceof \Illuminate\View\ComponentSlot)
        <div class="ms-2">
            {!! $label !!}
        </div>

    @else
        <label for="{{ $uuid }}" {{$attributes->merge(['class' => 'ms-2 disabled:text-gray-300 '. $textSize()])}}>
            {!! $label !!}
        </label>
    @endif
</div>