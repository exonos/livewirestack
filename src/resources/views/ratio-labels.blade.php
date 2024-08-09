<div x-data="{ showMore: false }" class="mt-2 w-full">
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
        <ul class="grid w-full gap-1 grid-cols-{{$columns}}">
        @foreach(collect($options)->take($showing) as $key => $value)
            <li>
                <input type="{{ $multiple ? 'checkbox' : 'radio' }}"
                       @if(!empty(old($modelName())) && in_array($value["$keyOption"], old($modelName()))) checked @elseif(!$multiple && $key === 0) checked @endif {{$attributes->except('id')}}
                       value="{{$value["$keyOption"]}}"
                       class="hidden peer" id="{{$uuid.$value["$valueOption"].$value["$keyOption"]}}">
                <label for="{{$uuid.$value["$valueOption"].$value["$keyOption"]}}" {{$attributes->class([
                        "relative [&_.custom-option]:scale-100 peer-checked:[&_.custom-option]:scale-0 [&_svg]:scale-0 peer-checked:[&_svg]:scale-100 inline-flex items-center w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-2 peer-checked:bg-blue-50 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700",
                        ' bg-red-50 border-2 border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' => $errors->has($modelName()),
                    ])}}
                >
                    <svg aria-hidden="true" class="absolute duration-300 ease-out custom-checkbox w-3 h-3 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="relative ease-out bg-gray-100 custom-option w-4 h-4 rounded border border-gray-200"></span>

                    <span class="block">
                        <span class="w-full text-xs ml-2 dark:text-white peer-checked:text-blue-500 font-bold">
                            {{$value["$valueOption"]}}
                            @if(isset($value["hint"]))
                                <p class="w-full text-xs ml-2 font-normal text-gray-500">{{$value["hint"]}}</p>
                            @endif
                        </span>

                    </span>
                </label>
            </li>
        @endforeach
        @if(collect($options)->count() > $showing)
            @foreach(collect($options)->slice($showing) as $key => $value)
                <li x-show="showMore">
                    <input type="{{ $multiple ? 'checkbox' : 'radio' }}"
                           @if(!empty(old($modelName())) && in_array($value["$keyOption"], old($modelName()))) checked @elseif(!$multiple && $key === 0) checked @endif {{$attributes->except('id')}}
                           value="{{$value["$keyOption"]}}"
                           class="hidden peer" id="{{$uuid.$value["$valueOption"].$value["$keyOption"]}}">
                    <label for="{{$uuid.$value["$valueOption"].$value["$keyOption"]}}"
                           class="relative [&_.custom-option]:scale-100 peer-checked:[&_.custom-option]:scale-0 [&_svg]:scale-0 peer-checked:[&_svg]:scale-100 inline-flex items-center w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-2 peer-checked:bg-blue-50 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="absolute duration-300 ease-out custom-checkbox w-3 h-3 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="relative ease-out bg-gray-100 custom-option w-4 h-4 rounded border border-gray-200"></span>
                        <span class="block">
                                <span class="w-full text-xs ml-2 dark:text-white peer-checked:text-blue-500 font-bold">
                                    {{$value["$valueOption"]}}
                                    @if(isset($value["hint"]))
                                        <p class="w-full text-xs ml-2 font-normal text-gray-500">{{$value["hint"]}}</p>
                                    @endif
                                </span>
                            </span>
                    </label>
                </li>
            @endforeach
        <button @click="showMore = !showMore"
                        type="button"
                        aria-label="Mostrar menos"
                        class="flex relative items-center font-sans text-base font-bold leading-normal text-blue-800 bg-transparent bg-none rounded-lg appearance-none cursor-pointer select-none hover:text-blue-900"
                >

                    <span x-show="!showMore">
                        Mostrar {{collect($options)->count()-$showing}} más
                    </span>
                    <span x-show="showMore">
                        Mostrar menos
                    </span>
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            focusable="false"
                            role="img"
                            :class="{'rotate-180': !showMore}"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                            class="block flex-none leading-6"
                            style="inline-size: 1.5rem; block-size: 1.5rem; margin-inline-start: 0.5rem;"
                    >
                        <path
                                d="M18.003 14.112c.2.2.204.521.008.716l-.707.708a.506.506 0 01-.716-.01l-4.587-4.587-4.587 4.587c-.2.2-.521.205-.716.01l-.708-.707a.507.507 0 01.01-.717l5.647-5.648c.1-.1.234-.148.367-.143.125.002.247.05.34.144h.001a.364.364 0 01.008.008l5.64 5.64z"
                                class="text-blue-900"
                        ></path>
                    </svg>
                </button>
        @endif
        </ul>


        <!-- ERROR -->
        @error($modelName())
        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
</div>
