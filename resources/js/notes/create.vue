<template>
    <div class="small-box" :style="style">
        <div class="small-box-footer clearfix">
            <span class="pull-left">
                <colors :form="form"></colors>
            </span>
            <span class="pull-right">
                <!--<i class="fas fa-save fa-lg" @click.prevent="submit" disabled></i>-->
                <button class="btn btn-default btn-xs" :disabled="disabled" @click.prevent="submit">add</button>
            </span>
        </div>
        <div class="inner">
            <editable :form="form" column="body" @change="change"></editable>
        </div>
    </div>
</template>

<script>
    import Form from 'js/notes/form';
    import colors from 'js/notes/colors.vue';
    import editable from 'js/notes/editable.vue';

    export default {
        computed: {
            style() {
                return 'background-color:#' + this.form.color;
            },
        },
        data() {
            return {
                disabled: true,
                form: new Form(),
            }
        },
        methods: {
            change(innerText) {
                this.disabled = !innerText;
            },
            submit() {
                this.form.submit()
                    .then(() => {
                        this.form.reset();
                        this.$emit('created');
                    });
            },
        },
        components: {
            colors,
            editable,
        }
    }
</script>
