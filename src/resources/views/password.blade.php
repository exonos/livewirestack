<div>
    @if($label)
        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="password">
            {{ $label }}
            @if($hint)
                <p class="block mb-1 text-gray-400 text-xs">
                    {{ $hint }}
                </p>
            @endif
        </label>
    @endif
    <div class="relative mt-1 rounded-md" x-data="{ show : false }">
        <div class="absolute inset-y-0 right-0 flex items-center pr-2.5">
            <div class="cursor-pointer" x-on:click="show = !show">
                <svg class="h-5 w-5 text-gray-400" x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display: none;">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd"></path>
                </svg>
                <svg class="h-5 w-5 text-gray-400" x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18zM22.676 12.553a11.249 11.249 0 01-2.631 4.31l-3.099-3.099a5.25 5.25 0 00-6.71-6.71L7.759 4.577a11.217 11.217 0 014.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113z"></path>
                    <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0115.75 12zM12.53 15.713l-4.243-4.244a3.75 3.75 0 004.243 4.243z"></path>
                    <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 00-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 016.75 12z"></path>
                </svg>
            </div>
        </div>
        <input
            id="{{ $uuid }}"
            placeholder = "{{ $attributes->has('placeholder') ? $attributes->whereStartsWith('placeholder')->first() : "••••••••" }} "
            x-ref="myInput"
            {{ $attributes->only('wire:model') }}
            {{$attributes->except($money ? 'wire:model' : '')
                ->class(['bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                'border border-dashed' => $attributes->has('readonly') && $attributes->get('readonly') == true,
               'bg-red-50 border-red-500 text-red-900 placeholder-red-400 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' => $errors->has($modelName())
               ])
            }}
            :type="!show ? 'password' : 'text'"
        >
    </div>
    <!-- ERROR -->
    @error($modelName())
    <p class="mt-1 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> {{ $message }}</p>
    @enderror
</div>
