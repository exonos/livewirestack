<div>
    <!-- STANDARD LABEL -->
    @if($label)
        <label class="block text-sm mb-1 font-medium text-gray-900 dark:text-white" for="{{ $uuid }}">
            {{ $label }}
            @if($hint)
            <p class="block mb-1 text-gray-400 text-xs">
                {{ $hint }}
            </p>
            @endif
        </label>
    @endif

    <textarea id="{{ $uuid }}"
              rows="{{$rows}}"
              {{
                $attributes->merge(['type' => 'text'])
                           ->class([
                           'py-1 px-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                           'border border-dashed' => $attributes->has('readonly') && $attributes->get('readonly') == true,
                           'bg-red-50 border-red-500 text-red-900 placeholder-red-400 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' => $errors->has($modelName())
                          ])
                     }}
              placeholder="{{ $attributes->whereStartsWith('placeholder')->first() }}"
              name="{{ $attributes->whereStartsWith('name')->first() }}"
    >{{old($modelName())}}</textarea>

    <!-- ERROR -->
    @error($modelName())
    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
