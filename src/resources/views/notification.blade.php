<div x-cloak
     x-data="toast_base()"
     x-on:toast.window="add($event)"
     class="pointer-events-none fixed inset-0 flex flex-col items-end justify-end gap-y-2 px-4 py-4 md:justify-start z-50">
    <template x-for="toast in toasts" :key="toast.id">
        <div x-data="toast_loop(toast)"
             x-show="show"
             x-ref="toast"
             x-transition:enter="transform ease-out duration-300 transition"
             x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0  sm:translate-x-2 "
             x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
             class="flex w-full flex-col items-center space-y-4 md:items-end">
            <div class="group dark:bg-dark-700 pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="flex p-4">
                    <div class="flex-shrink-0">
                        <div x-show="toast.type === 'success'">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                        </div>
                        <div x-show="toast.type === 'error'">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                        </div>
                        <div x-show="toast.type === 'info'">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info icon</span>
                            </div>
                        </div>
                        <div x-show="toast.type === 'warning'">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                                </svg>
                                <span class="sr-only">Warning icon</span>
                            </div>
                        </div>
                        <div x-show="toast.type === 'question'">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                                <svg class="w-4 h-4text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                                </svg>
                            <span class="sr-only">Question icon</span>
                            </div>
                        </div>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class='text-sm text-gray-800' x-bind:class="{ 'font-medium' : !toast.confirm, 'font-semibold' : toast.confirm }" x-text="toast.title"></p>
                        <p class="dark:text-dark-400 mt-1 text-xs text-gray-800"
                           x-text="toast.description?.substring(0, 30) + '...'"
                           x-show="toast.description && toast.description.length > 30 && !expanded"></p>
                        <p class="dark:text-dark-400 mt-1 text-xs text-gray-800"
                           x-text="toast.description"
                           x-show="expanded || toast.description.length < 30"></p>
                        <template x-if="toast.options && (toast.options.confirm?.text || toast.options.cancel?.text)">
                            <div class='flex mt-3' x-bind:class="{ 'gap-x-2' : toast.options.confirm && toast.options.cancel }">
                                <button type='button' x-on:click="accept(toast)" class='inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-blue-600 rounded shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600' x-text="toast.options?.confirm?.text"></button>
                                <button type='button' x-on:click="reject(toast)" x-show="toast.options.cancel" class='inline-flex items-center px-2 py-1 text-xs font-semibold text-gray-900 bg-white rounded border border-gray-300 hover:bg-gray-50' x-text="toast.options?.cancel?.text"></button>
                            </div>
                        </template>
                    </div>
                    <div class="ml-4 flex min-h-full flex-col justify-between">
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" x-on:click="hide()" class="invisible group-hover:visible ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div x-show="toast.description.length > 30 && toast.description" class="ml-4 flex flex-shrink-0">
                            <button x-on:click="expanded = !expanded"
                                    type="button"
                                    class="inline-flex text-gray-400 focus:outline-none focus:ring-0">
                                <svg class="h-5 w-5" :class="{'rotate-180' : expanded}" x-show="toast.description.length > 30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="dark:bg-dark-600 relative h-1 w-full rounded-full bg-neutral-100">
                    <span x-ref="progress" x-bind:style="`animation-duration:${toast.timeout * 1000}ms`" class="animate-progress bg-primary-500 dark:bg-dark-400 absolute h-full duration-300 ease-linear" x-cloak></span>
                </div>
            </div>
        </div>
    </template>
</div>
