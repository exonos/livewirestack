<div>
    <!-- STANDARD LABEL -->
    @if($label)
        <div class="flex justify-between items-end">
            <label class="font-medium text-sm select-none text-gray-800 dark:text-white" for="{{ $id }}">
                {{ $label }}

                @if($attributes->has('required'))
                    <span class="font-extrabold text-red-500">*</span>
                @endif
            </label>

            @if($corner !== null)
                <label for="{{ $id }}" class="block text-xs font-medium disabled:opacity-60 text-gray-500 dark:text-gray-400 invalidated:text-negative-600 dark:invalidated:text-negative-700">
                    {{$corner}}
                </label>
            @endif
        </div>
    @endif
    @if($description)
        <p class="text-sm mb-1 text-gray-500 dark:text-white/60">
            {{ $description }}
        </p>
    @endif
    <div {{$attributes->class(['flex w-full relative block group' => $append || $prepend])}}>
        <!-- PREPEND -->
        @if($prepend)
            <span class="inline-flex items-center text-xs text-gray-500 bg-transparent border-transparent rounded-l dark:text-gray-400">
                {{ $prepend }}
            </span>
        @endif
        <div {{$attributes->class([
                ($prepend && !$append) ? 'rounded-r border-l-0' : '',
                (!$prepend && $append) ? 'rounded-l border-r-0' : '',
                ($prepend && $append) ? 'rounded-l-none border-r-0 rounded-r-none border-l-0' : '',
                (!$prepend && !$append) ? 'rounded' : '',
                "$getVariant() disabled:opacity-50 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none flex focus-within:ring-primary focus-within:ring-1 focus-within:border-gray-300 items-center border border-gray-200 dark:border-gray-600 w-full overflow-hidden dark:placeholder-gray-400 dark:placeholder-gray-400 dark:text-white hover:bg-gray-100 dark:bg-gray-700",
                'border-2 border-dashed focus:border-none' => $attributes->has('readonly'),
                'bg-red-50 border-red-500 text-red-900 placeholder-red-500 focus:ring-red-500 focus:border-red-500' => $errors->has($modelName()),
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
            <span class="inline-flex items-center text-xs text-gray-500 rounded-r bg-transparent border-transparent">
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
        <p class="block mt-0.5 text-gray-500 italic text-sm">
            {{ $hint }}
        </p>
    @endif

</div>
