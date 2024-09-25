<div>
    @if($label)
        <div class="flex justify-between items-end">
            <label class="font-medium select-none text-gray-800 dark:text-white" for="">
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
    <div class="relative mt-1 rounded group/input" x-data="{ show : false }">
        <div class="absolute inset-y-0 right-0 flex items-center pr-2.5 invisible group-hover/input:visible">
            <div class="cursor-pointer" x-on:click="show = !show">
                <svg class="h-5 w-5 text-gray-400" x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display: none;">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd"></path>
                </svg>
                <svg class="h-5 w-5 text-gray-400" x-show="!show" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M3.05 9.31a1 1 0 1 1 1.914-.577c2.086 6.986 11.982 6.987 14.07.004a1 1 0 1 1 1.918.57a9.5 9.5 0 0 1-1.813 3.417L20.414 14A1 1 0 0 1 19 15.414l-1.311-1.311a9.1 9.1 0 0 1-2.32 1.269l.357 1.335a1 1 0 1 1-1.931.518l-.364-1.357c-.947.14-1.915.14-2.862 0l-.364 1.357a1 1 0 1 1-1.931-.518l.357-1.335a9.1 9.1 0 0 1-2.32-1.27l-1.31 1.312A1 1 0 0 1 3.585 14l1.275-1.275c-.784-.936-1.41-2.074-1.812-3.414Z"/></g></svg>
            </div>
        </div>
        <input
            id="{{ $id }}"
            placeholder="{{ $attributes->has('placeholder') ? $attributes->whereStartsWith('placeholder')->first() : "••••••••" }} "
            x-ref="myInput"
            {{ $attributes->only('wire:model') }}
            {{$attributes
                ->class([ "$getWidth $getVariant disabled:opacity-50 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none flex focus-within:ring-primary focus-within:ring-1 focus-within:border-gray-300 items-center border border-gray-200 dark:border-gray-600 w-full overflow-hidden dark:placeholder-gray-400 dark:placeholder-gray-400 dark:placeholder-gray-400 dark:text-white hover:bg-gray-100 dark:bg-gray-700 rounded",
                'border-2 border-dashed focus:border-none' => $attributes->has('readonly') && $attributes->get('readonly') == true,
               'bg-red-50 border-red-500 text-red-900 placeholder-red-400 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' => $errors->has($modelName())
               ])
            }}
            :type="!show ? 'password' : 'text'"
        >
    </div>
    <!-- ERROR -->
    @error($modelName())
    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror

        @if($hint)
            <p class="block mt-0.5 text-gray-500 font-extralight italic text-xs">
                {{ $hint }}
            </p>
        @endif
</div>
