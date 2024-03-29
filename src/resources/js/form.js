const form = ({ recaptcha, initialData = {}, useFormData = false }) => ({
    recaptcha: recaptcha,

    formData: { ...initialData },

    useFormData: useFormData,

    isLoading: false,

    honeypot: {
        startTime: Date.now(),
    },

    toFastSubmit() {
        const millisecondsElepsaded = Math.round(
            Date.now() - this.honeypot.startTime
        );

        return millisecondsElepsaded < 1000;
    },

    async handleSubmit() {
        if (this.toFastSubmit()) {
            window.location.href = 'https://www.google.se/';
            return;
        }

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

        if (this.recaptcha && window.grecaptcha) {
            const token = await window.grecaptcha.execute(this.recaptcha, {
                action: 'form',
            });

            this.formData.gRecaptchaResponse = token;
        }

        const url = this.$el.action;
        const method = this.$el.method;

        this.formData.submitted_from = window.location.href;

        await fetch(url, {
            method: method,
            headers: this.getHeaders(),
            body: this.getSubmitData(),
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

    getHeaders() {
        if (this.useFormData) {
            return;
        }

        return {
            'Content-Type': 'application/json',
        };
    },

    getSubmitData() {
        if (!this.useFormData) {
            return JSON.stringify(this.formData);
        }

        const formData = new FormData();

        for (const key in this.formData) {
            if (this.formData[key]) {
                const data = this.formData[key];

                formData.append(key, data);
            }
        }

        return formData;
    },

    handleError(error) {
        this.$dispatch('failed', error);
    },

    clearForm() {
        this.formData = { ...initialData };
    },
});

document.addEventListener('alpine:init', () => {
    window.Alpine.data('form', form);
});
