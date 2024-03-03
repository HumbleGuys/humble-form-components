const r = ({ recaptcha: s, initialData: o = {}, useFormData: e = !1 }) => ({
  recaptcha: s,
  formData: { ...o },
  useFormData: e,
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
    const a = this.$el.action, i = this.$el.method;
    this.formData.submitted_from = window.location.href, await fetch(a, {
      method: i,
      headers: {
        "Content-Type": this.useFormData ? "multipart/form-data" : "application/json"
      },
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
  getSubmitData() {
    if (!this.useFormData)
      return JSON.stringify(this.formData);
    const a = new FormData();
    for (const i in this.formData)
      if (this.formData[i]) {
        const t = this.formData[i];
        a.append(i, t);
      }
    return a;
  },
  handleError(a) {
    this.$dispatch("failed", a);
  },
  clearForm() {
    this.formData = { ...o };
  }
});
document.addEventListener("alpine:init", () => {
  window.Alpine.data("form", r);
});
