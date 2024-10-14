
<div x-data="{ switchOn: {{$entangle()}}, size: '{{$size}}'}" class="flex items-center">
    <input id="{{$uuid}}" type="checkbox" name="switch" class="hidden" :checked="switchOn">
    @if ($label && $position === 'left')
        <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
               :class="{ 'text-{{$color}}-600': switchOn, 'text-gray-500': ! switchOn }"
               class="text-sm select-none mr-2"
               x-cloak>
            {!! $label !!}
        </label>
    @endif
    <button
        x-ref="switchButton"
        type="button"
        @click="switchOn = ! switchOn"
        :class="switchOn ? 'bg-{{$color}}-600' : 'bg-gray-200'"
        class="relative inline-flex py-0.5 focus:outline-none rounded-full @if($size === 'lg') w-10 h-6 @else w-6 h-4 @endif"
        x-cloak>
        <span :class="switchOn ? size === 'lg' ? 'translate-x-[18px]' : 'translate-x-[10px]' : 'translate-x-0.5'" class="duration-200 ease-in-out bg-white rounded-full shadow-md @if($size === 'lg') w-5 h-5 @else w-3 h-3 @endif">
            <span :class="switchOn ? 'opacity-0 duration-100 ease-out' : 'opacity-100 duration-200 ease-in'" class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
              <svg class="h-3 w-3 text-gray-600" fill="none" viewBox="0 0 12 12">
                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>

            <span :class="switchOn ? 'opacity-100 duration-200 ease-in' : 'opacity-0 duration-100 ease-out'" class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
              <svg class="h-3 w-3 text-{{$color}}-600" fill="currentColor" viewBox="0 0 12 12">
                <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
              </svg>
            </span>
        </span>
    </button>

    @if ($label && $position === 'right')
        <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
               :class="{ 'text-{{$color}}-600': switchOn, 'text-gray-500': ! switchOn }"
               class="@if($size === 'lg') text-sm @else text-xs @endif select-none ml-2 font-semibold"
               x-cloak>
            {!! $label !!}
            @if(isset($description))
                <p class="font-normal text-gray-400 dark:text-gray-600 @if($size === 'lg') text-sm @else text-xs @endif">
                    {!! $description !!}
                </p>
            @endif
        </label>
    @endif
</div>
