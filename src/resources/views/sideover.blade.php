<div x-data="{
        slideOverOpen: {{$entangleable()}},
        title: '{{$title}}'
    }"
     class="relative z-50 w-auto h-auto">
    @if(isset($trigger))
        {{$trigger}}
    @endif
    <template x-teleport="body">
        <div
                x-show="slideOverOpen"
                @keydown.window.escape="slideOverOpen=false"
                class="relative z-[99]">
            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false" class="fixed inset-0 backdrop-blur-sm bg-black bg-opacity-10"></div>
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full">
                        <div
                                x-show="slideOverOpen"
                                x-on:close.stop="slideOverOpen = false"
                                x-on:keydown.escape.window="slideOverOpen = false"
                                x-on:open-sideover.window="$event.detail == '{{ $modelName() }}' ? slideOverOpen = true : null"
                                x-on:close-sideover.window="$event.detail == '{{ $modelName() }}' ? slideOverOpen = false : null"
                                @click.away="slideOverOpen = false"
                                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:enter-start="translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="translate-x-full"
                                class="w-screen {{$size}}">
                            <div class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                                @if($fixed() === 'true')
                                <div class="px-4 sm:px-5">
                                    <div class="flex items-start justify-between pb-1">
                                        <h2 class="text-base font-semibold leading-6 text-gray-900" x-text="title"></h2>
                                        <div class="flex items-center h-auto ml-3">
                                            <button @click="slideOverOpen=false" class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                <span>Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="relative flex-1 @if($fixed() === 'true') px-4 mt-5 sm:px-5 @endif">
                                    {{$content ??  $slot}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>