export default () => ({
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
});
