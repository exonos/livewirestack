<div x-cloak x-on:confirm.window="setConfirm($event)"
     x-on:keydown.escape.window="open = false"
     x-data="confirmable()" >

    <div x-show="open" class="absolute inset-0 z-10 w-full h-full bg-black opacity-25"></div>
    <div x-show="open"
         x-transition:enter="transition ease-in duration-200"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-out duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-lg max-w-[70%]"
         @click.away="closeConfirm()">
        <div class="p-8">
            <div class="flex items-start">
                <h3 class="mt-0 mb-0 pr-5 flex-1 font-semibold text-xl" x-text="config.title"></h3>

                <span class="block cursor-pointer transition-colors text-stone-400 hover:text-stone-900 dark:hover:text-stone-50" @click="closeConfirm()">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </span>
            </div>

            <div class="pt-5" >
                <p x-text="config.message"></p>
            </div>
        </div>

        <div class="flex items-center flex-wrap space-x-5 py-5 px-8 justify-end bg-white dark:bg-stone-800 border-t border-t-stone-200 dark:border-t-stone-700">
            <button @click="closeConfirm()" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                No
            </button>

            <button  @click="yesConfirm()" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Yes
            </button>
        </div>
    </div>
</div>
