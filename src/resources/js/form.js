const form = ({ recapatcha, initialData = {} }) => ({
    recapatcha: recapatcha,

    formData: { ...initialData },

    isLoading: false,

    honeypot: {
        startTime: Date.now(),
    },

    init() {
        console.log(this.recapatcha);
    },

    toFastSubmit() {
        const millisecondsElepsaded = Math.round(
            Date.now() - this.honeypot.startTime
        );

        return millisecondsElepsaded < 1000;
    },

    async handleSubmit() {
        if (this.toFastSubmit()) {
            window.location.href = "https://www.google.se/";
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
        this.$dispatch("beforesubmit");

        if (this.recapatcha && window.grecaptcha) {
            const token = await window.grecaptcha.execute(this.recapatcha, {
                action: "form",
            });

            this.formData.gRecaptchaResponse = token;
        }

        const url = this.$el.action;
        const method = this.$el.method;

        this.formData.submitted_from = window.location.href;

        await fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
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
                this.$dispatch("success", data);

                this.clearForm();
            })
            .catch((error) => {
                this.handleError(error);
            });
    },

    handleError(error) {
        this.$dispatch("error", error);
    },

    clearForm() {
        this.formData = { ...initialData };
    },
});

document.addEventListener("alpine:init", () => {
    window.Alpine.data("form", form);
});
