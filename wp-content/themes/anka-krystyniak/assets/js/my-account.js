function initCheckoutLoginFormScripts() {
    const registerBtnEl = document.querySelector(
        ".woocommerce-form-register__submit"
    );
    const consentBtnEl = document.getElementById("register-form-consent");

    if (consentBtnEl && registerBtnEl) {
        consentBtnEl.addEventListener("change", (e) => {
            registerBtnEl.classList.toggle("disabled");
            registerBtnEl.disabled = !e.target.value;
        });
    }
}

function initMyAccountPageScripts() {
    initCheckoutLoginFormScripts();
}

export { initMyAccountPageScripts };
