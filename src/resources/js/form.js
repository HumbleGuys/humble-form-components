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

        this.$dispatch('beforesubmit');

        console.log(this.formData);

        console.log(method, url);

        this.$dispatch('aftersubmit');
    }
});

document.addEventListener('alpine:init', () => {
    window.Alpine.data('form', form);
})

