const r = ({ recaptcha: s, initialData: i = {}, useFormData: o = !1 }) => ({
  recaptcha: s,
  formData: { ...i },
  useFormData: o,
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
    const a = this.$el.action, e = this.$el.method;
    this.formData.submitted_from = window.location.href, await fetch(a, {
      method: e,
      headers: this.getHeaders(),
      body: this.getSubmitData()
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
  getHeaders() {
    if (!this.useFormData)
      return {
        "Content-Type": "application/json"
      };
  },
  getSubmitData() {
    if (!this.useFormData)
      return JSON.stringify(this.formData);
    const a = new FormData();
    for (const e in this.formData)
      if (this.formData[e]) {
        const t = this.formData[e];
        a.append(e, t);
      }
    return a;
  },
  handleError(a) {
    this.$dispatch("failed", a);
  },
  clearForm() {
    this.formData = { ...i };
  }
});
document.addEventListener("alpine:init", () => {
  window.Alpine.data("form", r);
});
