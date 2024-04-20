<div>
    <form wire:submit.prevent="save">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                @foreach($tabInstances as $tabInstance)
                    <li class="mr-2 cursor-pointer">
                        <a wire:click="setTab({{ $tabInstance->getOrder() }})"
                                @class([
                                 'inline-flex py-4 px-4 text-sm font-medium text-center rounded-t-lg border-b-2 group',
                                 'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300' => !$tabInstance->isActive(),
                                 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' => $tabInstance->isActive(),
                                ])
                        >
                            {{ $tabInstance->icon() }}
                            {{ $tabInstance->title() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container p-4">
            {{ $this->getCurrentTab() }}
        </div>

        {{ $this->tabFooter() }}
    </form>
</div>