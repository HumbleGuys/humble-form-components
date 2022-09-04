const form = () => ({
    formData: {},

    isLoading: false,

    async handleSubmit () {
        if (this.isLoading) {
            return;
        }

        this.isLoading = true;

        try {
            await this.submit();
        } catch (error) {
            this.handleError(error);
        } finally {
            this.isLoading = false;
        }
    },

    async submit() {
        this.$dispatch('beforesubmit');

        const url = this.$el.action;
        const method = this.$el.method;

        this.formData.submitted_from = window.location.href;

        await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(this.formData),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data);

            this.$dispatch('success', data);
        })
        .catch((error) => {
            this.handleError(error);
        });
    },

    handleError (error) {
        this.$dispatch('error', error);
        console.log(error);
    }
});

document.addEventListener('alpine:init', () => {
    window.Alpine.data('form', form);
})

