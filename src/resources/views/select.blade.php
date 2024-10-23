<div>
    @if($label)
        <div class="flex justify-between items-end">
            <label class="font-medium text-sm select-none text-gray-800 dark:text-white" for="{{ $id }}">
                {{ $label }}

                @if($attributes->has('required'))
                    <span class="font-extrabold text-danger-500">*</span>
                @endif
            </label>

            @if($corner !== null)
                <label for="{{ $id }}" class="block text-xs font-medium disabled:opacity-60 text-gray-500 dark:text-gray-400 invalidated:text-negative-600 dark:invalidated:text-negative-700">
                    {{$corner}}
                </label>
            @endif
        </div>
    @endif
    <div {{$attributes->class([
    'flex w-full relative block group/input' => $append || $prepend,
    'border border-transparent'
    ])}}>
        @if($prepend)
            <span  class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-l border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                {{ $prepend }}
            </span>
        @endif
        <div x-data="ui_select(
        {{$entangleable()}},
        null,
        JSON.parse('{{json_encode($selectable)}}'),
        JSON.parse('{{ str_replace("'", "\'", json_encode($options)) }}'),
        {{$multiple()}},
        {{$dimensional()}},
        '{{$attributes->has('placeholder') ? $attributes->whereStartsWith('placeholder')->first() : 'Selecciona una opcion'}}',
        {{$searchable()}},
        true)" class="w-full">
            <div class="relative" x-on:click.outside="show = false">
                <button type="button" x-ref="button"
                        {{
                           $attributes
                           ->except('wire:model')
                           ->class([
                               ($prepend && !$append) ? 'rounded-r border-l-0' : '',
                                (!$prepend && $append) ? 'rounded-l border-r-0' : '',
                                ($prepend && $append) ? 'rounded-l-none border-r-0 rounded-r-none border-l-0' : '',
                                (!$prepend && !$append) ? 'rounded' : '',
                               "$getVariant $getWidth disabled:opacity-50 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none flex focus-within:ring-primary focus-within:ring-1 focus-within:border-gray-300 items-center border border-gray-200 dark:border-gray-600 w-full overflow-hidden dark:placeholder-gray-400 dark:placeholder-gray-400 dark:text-white hover:bg-gray-100 dark:bg-gray-700",
                                'border border-dashed pointer-events-none' => $attributes->has('readonly') && $attributes->get('readonly') == true,
                               'bg-danger-50 border-danger-500 text-danger-900 placeholder-danger-400 focus:ring-danger-500 focus:border-danger-500 dark:text-danger-500 dark:placeholder-danger-500 dark:border-danger-500' => $errors->has($modelName())
                               ])
                        }}
                        x-on:click="show = !show" aria-haspopup="listbox" aria-expanded="false">
                    <div class="relative inset-y-0 left-0 flex w-full items-center overflow-hidden rounded-lg pl-2 transition space-x-2">
                        <div class="flex gap-2">
                            <input type="hidden" name="{{$modelName()}}" id="{{ $id }}" x-model="model">
                            <template x-if="multiple &amp;&amp; quantity > 0">
                                <span x-text="quantity"></span>
                            </template>
                            <template x-if="empty || (!multiple &amp;&amp; 'Select an option' !== placeholder)">
                                <span class="truncate" x-bind:class="{
                                'text-gray-400 dark:text-gray-400': empty,
                                'text-gray-600 dark:text-gray-300': !empty
                              }" x-text="placeholder"></span>
                            </template>
                            <div class="truncate" x-show="multiple &amp;&amp; quantity > 0">
                                <template x-for="(selected, index) in selecteds" :key="index">
                                    <a class="cursor-pointer">
                                        <div class="inline-flex items-center rounded bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-200 space-x-1 dark:text-gray-300 dark:bg-gray-700 dark:ring-gray-600">
                                            <span x-text="selected"></span>
                                            <svg class="h-4 w-4 text-danger-500" x-on:click="clear(selected); show = true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="mr-2 flex items-center">
                        <template x-if="!empty">
                            <button  type="button" x-on:click="clear(); show = true">
                                <svg class="h-5 w-5 text-secondary-500 dark:text-gray-400 hover:text-danger-500 dark:hover:text-danger-500"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </template>
                        <svg class="h-5 w-5 text-secondary-500 dark:text-gray-400 hover:text-danger-500 dark:hover:text-danger-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M11.47 4.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 01-1.06 1.06L12 6.31 8.78 9.53a.75.75 0 01-1.06-1.06l3.75-3.75zm-3.75 9.75a.75.75 0 011.06 0L12 17.69l3.22-3.22a.75.75 0 111.06 1.06l-3.75 3.75a.75.75 0 01-1.06 0l-3.75-3.75a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </button>
                <div wire:ignore x-cloak x-ref="select" x-show="show" x-on:click.outside="show = false" x-on:keydown.escape.window="show = false" x-intersect:leave="show = false" x-anchor.bottom-end.offset.10="$refs.button" x-transition:enter="transition duration-100 ease-out" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="dark:bg-dark-700 border-dark-200 dark:border-dark-600 absolute z-40 rounded-lg border bg-white w-full overflow-auto">
                    <template x-if="searchable">
                        <div class="relative px-2 my-2">
                            <div>
                                <div class="relative mt-1 rounded">
                                    <input
                                            id="65692470d9b9e"
                                            class="transition duration-150 text-xs ease-in-out block w-full p-2 text-gray-900 border border-gray-300 rounded bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Busca algo aqui"
                                            x-model.debounce.500ms="search"
                                            x-ref="search"
                                            x-on:click.stop
                                    >
                                </div>
                            </div>
                            <button type="button" class="absolute inset-y-0 right-2 flex cursor-pointer items-center px-2"
                                    x-on:click="search = ''; $refs.search.focus();" x-show="search.length > 0">
                                <svg class="h-5 w-5 transition text-secondary-500 hover:text-danger-500"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </template>
                    <ul class="max-h-60 w-full overflow-auto rounded-b text-base soft-scrollbar focus:outline-none sm:text-sm" role="listbox">
                        <template x-for="(option, index) in options" :key="index">
                            <li x-on:click="select(option)" x-on:keypress.enter="select(option)"
                                x-bind:class="{ 'font-semibold hover:font-bold hover:bg-gray-100 dark:hover:bg-gray-500': selected(option) }"
                                role="option"
                                class="relative cursor-pointer select-none px-2 py-2 text-gray-700 transition hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-500 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-500">
                                <div wire:ignore="" class="flex items-center justify-between">
                                    <span class="ml-2 truncate dark:text-gray-300" x-text="option[selectable.label] ?? option"></span>
                                    <svg x-show="selected(option)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 font-bold text-green-500">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </li>
                        </template>
                        <template x-if="!loading &amp;&amp; options.length === 0">
                            @if(isset($emptyAction))
                                {{$emptyAction}}
                            @else
                                <li class="m-2">
                            <span class="block w-full text-xs text-center pr-2 text-gray-500 dark:text-gray-300">
                                Sin resultados
                            </span>
                                </li>
                            @endif
                        </template>
                    </ul>
                </div>
            </div>
        </div>
        @if($append)
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-r border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                {{ $append }}
            </span>
        @endif
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
