const s = ({ recaptcha: e, initialData: i = {} }) => ({
  recaptcha: e,
  formData: { ...i },
  isLoading: !1,
  honeypot: {
    startTime: Date.now()
  },
  toFastSubmit() {
    return Math.round(
      Date.now() - this.honeypot.startTime
    ) < 1e3;
  },
  async handleSubmit() {
    if (this.toFastSubmit()) {
      window.location.href = "https://www.google.se/";
      return;
    }
    if (!this.isLoading) {
      this.isLoading = !0;
      try {
        await this.submit();
      } catch (a) {
        this.handleError(a);
      } finally {
        this.isLoading = !1;
      }
    }
  },
  async submit() {
    if (this.$dispatch("beforesubmit"), this.recaptcha && window.grecaptcha) {
      const t = await window.grecaptcha.execute(this.recaptcha, {
        action: "form"
      });
      this.formData.gRecaptchaResponse = t;
    }
    const a = this.$el.action, o = this.$el.method;
    this.formData.submitted_from = window.location.href, await fetch(a, {
      method: o,
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(this.formData)
    }).then((t) => {
      if (!t.ok)
        throw new Error(`Error! status: ${t.status}`);
      return t;
    }).then((t) => t.json()).then((t) => {
      this.$dispatch("success", t), this.clearForm();
    }).catch((t) => {
      this.handleError(t);
    });
  },
  handleError(a) {
    this.$dispatch("handleError", a);
  },
  clearForm() {
    this.formData = { ...i };
  }
});
document.addEventListener("alpine:init", () => {
  window.Alpine.data("form", s);
});
