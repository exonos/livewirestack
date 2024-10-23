<div>
    <!-- STANDARD LABEL -->
    @if($label && !$inline)
        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="password">
            {{ $label }}
            @if($hint)
                <p class="block mb-1 text-gray-400 text-xs">
                    {{ $hint }}
                </p>
            @endif
        </label>
    @endif
    <div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags="">
        <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
            <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                <input type="hidden" x-model="tags" name="{{$modelName()}}" id="{{ $uuid }}"/>
                <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)"
                       placeholder="{{ $attributes->whereStartsWith('placeholder')->first() }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <div :class="[open ? 'block' : 'hidden']">
                    <div class="absolute z-40 left-0 mt-2 w-full">
                        <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                            <a @click.prevent="addTag(textInput)" class="block py-1 px-5 cursor-pointer hover:bg-blue-600 hover:text-white">Agregar "<span class="font-semibold" x-text="textInput"></span>"</a>
                        </div>
                    </div>
                </div>
                <!-- selections -->
                <div class="py-1 space-x-1">
                    <template x-for="(tag, index) in tags">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                        <span x-text="tag"></span>
                        <svg @click.prevent="removeTag(index)"  class="w-5 h-5 ml-1.5 text-blue-500 font-bold fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
                    </span>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <!-- ERROR -->
    @error($modelName())
    <p class="mt-1 text-sm text-danger-600 dark:text-danger-500">{{ $message }}</p>
    @enderror
</div>
<script>
    function tagSelect() {
        return {
            open: false,
            textInput: '',
            tags: [],
            init() {
                this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
            },
            addTag(tag) {
                tag = tag.trim()
                if (tag != "" && !this.hasTag(tag)) {
                    this.tags.push( tag )
                }
                this.clearSearch()
                this.$refs.textInput.focus()
                this.fireTagsUpdateEvent()
            },
            fireTagsUpdateEvent() {
                this.$el.dispatchEvent(new CustomEvent('tags-update', {
                    detail: { tags: this.tags },
                    bubbles: true,
                }));
            },
            hasTag(tag) {
                var tag = this.tags.find(e => {
                    return e.toLowerCase() === tag.toLowerCase()
                })
                return tag != undefined
            },
            removeTag(index) {
                this.tags.splice(index, 1)
                this.fireTagsUpdateEvent()
            },
            search(q) {
                if ( q.includes(",") ) {
                    q.split(",").forEach(function(val) {
                        this.addTag(val)
                    }, this)
                }
                this.toggleSearch()
            },
            clearSearch() {
                this.textInput = ''
                this.toggleSearch()
            },
            toggleSearch() {
                this.open = this.textInput != ''
            }
        }
    }
</script>
