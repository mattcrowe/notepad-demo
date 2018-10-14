<template>
    <div contenteditable="true" @blur="update" @keyup="change" v-html="innerText" style="white-space: pre-wrap;">{{ form[column] }}</div>
</template>

<script>
    export default {
        props: ['form', 'column'],
        data() {
            return {
                innerText: '',
            }
        },
        updated() {
            this.innerText = this.form[this.column];
        },
        methods: {
            change(event) {
                this.$emit('change', event.target.innerText);
            },
            update(event) {
                this.innerText = event.target.innerText;
                this.form[this.column] = event.target.innerText;
                this.$emit('update');
            }
        }
    }
</script>
