<div
    x-data="{show: {{$entangleable() ?? false}}}"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:open-modal.window="$event.detail == '{{ $modelName() }}' ? show = true : null"
    x-show="show"
    class="fixed inset-0 z-10 overflow-y-auto"
    style="display: none;"
>
    @if(isset($trigger))
        {{$trigger}}
    @endif
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-10 text-center sm:block sm:p-0">
        <div
            x-show="show"
            x-on:click="show = false"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-all transform"
        >
            <div class="absolute inset-0 backdrop-blur-sm bg-black/30"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class=" @if($fixed() === 'true') py-6 px-7 @endif {{$size}} inline-block w-full align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full"
            id="modal-container"
            x-trap.noscroll.inert="show"
            aria-modal="true"
        >
            {{$content ??  $slot}}
        </div>
    </div>
</div>
