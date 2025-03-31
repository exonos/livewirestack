<div class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
    <form wire:submit="confirm">
        <div class="space-y-6 my-6 py-3">
            <div class="px-4">
                <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                    <button type="button" wire:click="$dispatch('modal.close')" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="sr-only">Cerrar</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $prompt['title'] }}</h3>
                    <div class="mt-2 text-center">
                        <p class="text-sm text-gray-500">{{ $prompt['message'] }}</p>
                    </div>
                </div>
            </div>

            @if($tableData)
                <div class="overflow-x-auto relative border-t border-gray-200">
                    <table class="w-full text-sm text-left text-gray-500 divide-y divide-gray-200">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            @foreach($tableHeaders as $header)
                                <th scope="col" class="py-3 px-6">
                                    {{ $header }}
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tableData as $columns)
                            <tr class="bg-white border-b">
                                @foreach($columns as $column)
                                    <td class="py-4 px-6">
                                        {{ $column }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if($confirmPhrase)
                <div class="px-4 sm:px-6 pt-2">
                    <input type="text" id="confirm-phrase" wire:model.defer="confirmPhraseInput" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="{{ __("wire-elements-pro::modal.confirmation.please_enter_phrase_to_continue", ['phrase' => $confirmPhrase]) }}" required>

                    @error('confirmPhraseInput')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        </div>

        <div class="flex flex-row justify-end px-3 py-2 bg-gray-100 dark:bg-gray-800 text-end">
            <div class="flex justify-between w-full">
                <button type="button" wire:click="cancel" class="text-gray-900 bg-white border border-gray-300 focus:outline-hidden hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-md text-xs px-5 py-1.5" wire:loading.attr="disabled">
                    {{ $prompt['cancel'] }}
                </button>
                <button type="submit" class="text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-md text-xs px-5 py-1.5 focus:outline-hidden" wire:loading.attr="disabled">
                    {{ $prompt['confirm'] }}
                </button>
            </div>
        </div>
    </form>
</div>
