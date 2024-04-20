import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

document.addEventListener('alpine:init', () => {
    window.Alpine.data('editor', (content) => {
        let editor
        return {
            updatedAt: Date.now(),
            content: content,
            isLoaded() {
                return editor
            },
            isActive(type, opts = {}) {
                return editor.isActive(type, opts)
            },
            setTextAlign(opts) {
                editor.chain().setTextAlign(opts).focus().run()
            },
            toggleHeading(opts) {
                editor.chain().toggleHeading(opts).focus().run()
            },
            toggleBulletList() {
                editor.chain().focus().toggleBulletList().run()
            },

            toggleBold() {
                editor.chain().toggleBold().focus().run()
            },
            toggleItalic() {
                editor.chain().toggleItalic().focus().run()
            },
            toggleOrderedList() {
                editor.chain().toggleOrderedList().focus().run()
            },
            setParagraph() {
                editor.chain().setParagraph.focus().run()
            },
            toggleBlockquote() {
                editor.chain().toggleBlockquote().focus().run()
            },
            toggleStrike() {
                editor.chain().toggleStrike().focus().run()
            },
            init() {
                const _this = this

                editor = new Editor({
                    element: this.$refs.element,
                    extensions: [
                        StarterKit
                    ],
                    content: this.content,
                    onCreate({ editor }) {
                        _this.updatedAt = Date.now()
                    },
                    onUpdate({ editor }) {
                        _this.updatedAt = Date.now()
                        this.content = editor.getHTML()
                    },
                    onSelectionUpdate({ editor }) {
                        _this.updatedAt = Date.now()
                    }
                })

                this.$watch('content', (content) => {
                    if (content === editor.getHTML()) return
                    editor.commands.setContent(content, false)
                })
            }
        }
    })
})