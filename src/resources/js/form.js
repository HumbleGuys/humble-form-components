const form = () => ({
    formData: {

    },

    init () {
        console.log('form')
    },

    handleSubmit () {
        const url = this.$el.action;
        const method = this.$el.method;

        this.formData.submitted_from = window.location.href;

        console.log(this.formData);

        console.log(method, url);
    }
});

document.addEventListener('alpine:init', () => {
    window.Alpine.data('form', form);
})

