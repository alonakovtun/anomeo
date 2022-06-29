export function ready(fn) {
    if (document.readyState != "loading") {
        fn();
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

export function removeEmptyValuesFromObject(paramsObj) {
    return Object.fromEntries(
        Object.entries(paramsObj).filter(
            ([_, v]) =>
                !(v === 0 || v === "" || (Array.isArray(v) && v.length === 0))
        )
    );
}

export function isCheckoutPage() {
    return document.body.classList.contains("woocommerce-checkout");
}

export function isMyAccountPage() {
    return document.body.classList.contains("page-template-template-account");
}

export function isHomePage() {
    return document.body.classList.contains("page-template-template-home");
}

export function isUserLoggedIn() {
    return document.body.classList.contains("logged-in");
}

export function emailIsValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}
