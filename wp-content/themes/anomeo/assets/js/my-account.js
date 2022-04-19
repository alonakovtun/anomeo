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

function showRegisterScripts() {
    const buttonTrigger = document.querySelector('.button__trigger-register'),
    visibileBox = document.querySelector('.login-box'),
    hiddenBox = document.querySelector('.register-box');

    buttonTrigger.addEventListener('click', (e) => {
    e.preventDefault();
    setTimeout(() => {
    visibileBox.style.display = 'none';
    hiddenBox.style.display = 'block';
    }, 1000)
    });
}

function initMyAccountPageScripts() {
    initCheckoutLoginFormScripts();
    // showRegisterScripts();
}

export { initMyAccountPageScripts };
