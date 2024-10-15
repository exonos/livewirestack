<div x-data="livewirestackOverlay({ type: 'modal', animationOverlapDuration: 350 })"
     @keydown.window.escape="closeIf('close-on-escape')"
     x-show="open"
     class="livewirestack-modal"
     :class="getElementAttribute('component-class')"
     aria-modal="true"
     x-cloak>
    <div x-show="open"
         x-transition:enter="enter"
         x-transition:enter-start="start"
         x-transition:enter-end="end"
         x-transition:leave="leave"
         x-transition:leave-start="start"
         x-transition:leave-end="end"
         class="livewirestack-modal-backdrop"
         aria-hidden="true">
    </div>

    <div class="livewirestack-modal-container">
        <div class="livewirestack-modal-inner-container">
            <div x-show="open && showActiveComponent"
                 x-transition:enter="enter"
                 x-transition:enter-start="start"
                 x-transition:enter-end="end"
                 x-transition:leave="leave"
                 x-transition:leave-start="start"
                 x-transition:leave-end="end"
                 x-bind:class="activeComponentWidth"
                 x-trap.inert.noscroll="getElementBehavior('trap-focus') && open"
                 class="livewirestack-modal-content">
                @foreach($components as $id => $component)
                    <div @click.outside="closeIf('close-on-backdrop-click')" x-show.immediate="activeComponent === '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                        @livewire($component['name'], $component['arguments'], key($id))
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
