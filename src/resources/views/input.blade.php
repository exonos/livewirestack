<div>
    <!-- STANDARD LABEL -->
    @if($label)
        <div class="flex mb-1 justify-between items-end">
            <label class="block font-normal dark:text-white text-xs text-gray-600" for="">
                {{ $label }}
            </label>
            @if($corner !== null)
                <label for="{{ $id }}" class="block text-xs font-medium disabled:opacity-60 text-gray-500 dark:text-gray-400 invalidated:text-negative-600 dark:invalidated:text-negative-700">
                    {{$corner}}
                </label>
            @endif
        </div>
    @endif
    <div {{$attributes->class(['flex' => $append || $prepend])}}>
        <!-- PREPEND -->
        @if($prepend)
            <span  class="inline-flex items-center px-3 text-xs text-gray-500 bg-gray-100 border rounded-l border-gray-200 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                {{ $prepend }}
            </span>
        @endif
        <div {{$attributes->class([
                ($prepend && !$append) ? 'rounded-r border-l-0' : '',
                (!$prepend && $append) ? 'rounded-l border-r-0' : '',
                ($prepend && $append) ? 'rounded-l-none border-r-0 rounded-r-none border-l-0' : '',
                (!$prepend && !$append) ? 'rounded' : '',
                'flex bg-gray-50 items-center border border-gray-200 dark:border-gray-600 w-full focus-within:ring-2 hover:border-gray-200 hover:bg-gray-100 focus-within:ring-gray-300 focus-within:border-gray-300 overflow-hidden dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white',
                'border-dashed' => $attributes->has('readonly'),
                'bg-red-50 border-red-500 text-red-900 placeholder-red-400 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' => $errors->has($modelName()),
            ])}}
        >
            @if($prefix)
                <span class="p-1.5 inset-y-0 start-0 flex items-center ml-2 text-gray-500">{{ $prefix }}</span>
            @endif
            <input id="{{ $id }}"
                   placeholder="{{$placeholder}}"
                   class="{{$getWidth()}} border-none outline-none border-transparent bg-transparent text-gray-900 dark:text-white block w-full focus:outline-none focus:ring-0 group-hover:border-gray-400 dark:group-hover:border-gray-600"
                    {{$attributes->merge(['type' => $type])}}
            />
                @if($suffix)
                    <span class="inset-y-0 start-0 flex placeholder-gray-50 items-center text-gray-500 mr-2">{{ $suffix }}</span>
                @endif
        </div>
        <!-- APPEND -->
        @if($append)
            <span class="inline-flex items-center px-3 text-xs text-gray-500 bg-gray-100 border rounded-r border-gray-200 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                {{ $append }}
            </span>
        @endif
    </div>


    <!-- ERROR -->
    @error($modelName())
    <p class="mt-0.5 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror

    <!-- HINT -->
    @if($hint)
        <p class="block mt-0.5 text-gray-500 font-extralight italic text-xs">
            {{ $hint }}
        </p>
    @endif

</div>
