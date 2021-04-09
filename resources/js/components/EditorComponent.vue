<template>
    <div class="editor" style="min-height: 396px;">
        <editor-content id="text" :editor="editor" />
    </div>
</template>

<script>
import Icon from './Icon'
import { Editor, EditorContent, EditorMenuBar } from 'tiptap'
import {
    Blockquote,
    CodeBlock,
    HardBreak,
    Heading,
    HorizontalRule,
    OrderedList,
    BulletList,
    ListItem,
    TodoItem,
    TodoList,
    Bold,
    Code,
    Italic,
    Link,
    Strike,
    Underline,
    History,
    Image,
    Placeholder
} from 'tiptap-extensions'
export default {
    components: {
        EditorContent,
        EditorMenuBar,
        Icon,
    },
    props: {
        content: String,
        isEdit: Boolean
    },
    mounted() {
        if (this.isEdit) {
            const content = this.content
            console.log('edit mode', content)
            this.editor.setContent(content)
        }
        let input = document.getElementById('content')
        let content = this.editor.getHTML()
        input.value = content
        console.log(content);
    },
    data() {
        return {
            editor: new Editor({
                extensions: [
                    new Blockquote(),
                    new BulletList(),
                    new CodeBlock(),
                    new HardBreak(),
                    new Heading({ levels: [1, 2, 3] }),
                    new HorizontalRule(),
                    new ListItem(),
                    new OrderedList(),
                    new TodoItem(),
                    new TodoList(),
                    new Link(),
                    new Bold(),
                    new Code(),
                    new Italic(),
                    new Strike(),
                    new Underline(),
                    new History(),
                    new Image(),
                    new Placeholder({
                        emptyEditorClass: 'is-editor-empty',
                        emptyNodeClass: 'is-empty',
                        emptyNodeText: 'Write something …',
                        showOnlyWhenEditable: true,
                        showOnlyCurrent: true,
                    }),
                ],
                onUpdate: ({ getHTML }) => {
                    let input = document.getElementById('content')
                    let content = getHTML();
                    input.value = content
                    console.log(content);
                }
            }),
        }
    },
    methods: {
        showImagePrompt(command) {
            const src = prompt('Enter the url of your image here')
            if (src !== null) {
                command({src})
            }
        },
    },
    beforeDestroy() {
        this.editor.destroy()
    },
}
</script>

<style lang="scss">
    [contenteditable]:focus {
        outline: 0px solid transparent;
    }
    .editor p.is-editor-empty:first-child::before {
        content: attr(data-empty-text);
        float: left;
        color: #aaa;
        height: 0;
        font-style: italic;
    }
</style>
