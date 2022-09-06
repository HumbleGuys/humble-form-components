const form = ({ initialData = {} }) => ({
    formData: {...initialData},

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
        .then((response) => {
            if (!response.ok) {
                throw new Error(`Error! status: ${response.status}`);
            }

            return response;
        })
        .then((response) => response.json())
        .then((data) => {
            this.$dispatch('success', data);

            this.clearForm();
        })
        .catch((error) => {
            this.handleError(error);
        });
    },

    handleError (error) {
        this.$dispatch('error', error);
    },

    clearForm () {
        this.formData = {...initialData};
    }
});

document.addEventListener('alpine:init', () => {
    window.Alpine.data('form', form);
})

