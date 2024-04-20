<div
        x-data="{
tooltipVisible: false,
tooltipArrow: true,
tooltipPosition: 'right',
}"
        x-init="$refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; }); $refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });"
        class="relative">
    <div x-ref="tooltip" x-show="tooltipVisible" :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top', 'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left', 'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom', 'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right' }" class="absolute w-auto text-sm" x-cloak>
        <div x-show="tooltipVisible"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90 -translate-x-2"
             x-transition:enter-end="opacity-100 scale-100 translate-x-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 scale-100 translate-x-0"
             x-transition:leave-end="opacity-0 scale-90 -translate-x-2"
             class="relative">
            {!! $label !!}
            <div x-ref="tooltipArrow" x-show="tooltipArrow" :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top', 'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left', 'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom', 'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right' }" class="absolute inline-flex items-center justify-center overflow-hidden">
                <div :class="{ 'origin-top-left -rotate-45' : tooltipPosition == 'top', 'origin-top-left rotate-45' : tooltipPosition == 'left', 'origin-bottom-left rotate-45' : tooltipPosition == 'bottom', 'origin-top-right -rotate-45' : tooltipPosition == 'right' }" class="w-1.5 h-1.5 transform bg-indigo-600 bg-opacity-90"></div>
            </div>
        </div>
    </div>
    <div x-ref="content" class="cursor-pointer">
        {!! $trigger !!}
    </div>
</div>