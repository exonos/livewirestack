<div class="w-full">
    <!-- STANDARD LABEL -->
    @if($label)
        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="password">
            {{ $label }}
        </label>
    @endif
    <div {{
            $attributes
            ->class([
                'flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                'border border-dashed' => $attributes->has('readonly') && $attributes->get('readonly') == true,
                'bg-danger-50 border-danger-500 text-danger-900 placeholder-danger-400 focus:ring-danger-500 focus:border-danger-500 dark:text-danger-500 dark:placeholder-danger-500 dark:border-danger-500' => $errors->has($modelName())
            ])
         }}
        class=""
        x-data="ui_number(
            'name',
            {{$min}},
             {{$max}},
            2,
            false)" data-has-alpine-state="true">
        <input id="{{ $uuid }}"
               placeholder="{{ $attributes->whereStartsWith('placeholder')->first() }}" type="number" inputmode="numeric"
               class="w-full border-0 bg-transparent p-1 py-1.5 ring-0 focus:ring-transparent focus:outline-none sm:text-sm sm:leading-6 appearance-number-none"
               x-ref="input" name="{{$modelName()}}" value="{{$value}}">
        <div class="flex items-center border-gray-200 -gap-y-px divide-x divide-gray-200 dark:divide-gray-700 dark:border-gray-700">
            <button x-on:click="decrement()" x-on:mousedown="interval = setInterval(() => decrement(), delay * 100);"
                    x-on:mouseup="clearInterval(interval);" x-on:mouseleave="clearInterval(interval);"
                    x-bind:class="{ 'opacity-30': atMin, 'pointer-events-none opacity-50': disabled }" type="button"
                    dusk="tallstackui_form_number_decrement" class="inline-flex px-3 items-center justify-center">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <button x-on:click="increment()" x-on:mousedown="interval = setInterval(() => increment(), delay * 100);"
                    x-on:mouseup="clearInterval(interval);" x-on:mouseleave="clearInterval(interval);"
                    x-bind:class="{ 'opacity-30': atMax, 'pointer-events-none opacity-50': disabled }" type="button"
                    dusk="tallstackui_form_number_increment"
                    class="inline-flex px-3 items-center justify-center opacity-30">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    @error($modelName())
    <p class="mt-1 text-sm text-danger-600 dark:text-danger-500">{{ $message }}</p>
    @enderror
    @if($hint)
        <p class="block mt-1 text-gray-500 text-xs">
            {{ $hint }}
        </p>
    @endif
</div>
