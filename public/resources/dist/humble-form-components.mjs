const e = ({ initialData: s = {} }) => ({
  formData: { ...s },
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
      } catch (i) {
        this.handleError(i);
      } finally {
        this.isLoading = !1;
      }
    }
  },
  async submit() {
    this.$dispatch("beforesubmit");
    const i = this.$el.action, o = this.$el.method;
    this.formData.submitted_from = window.location.href, await fetch(i, {
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
  handleError(i) {
    this.$dispatch("error", i);
  },
  clearForm() {
    this.formData = { ...s };
  }
});
document.addEventListener("alpine:init", () => {
  window.Alpine.data("form", e);
});
