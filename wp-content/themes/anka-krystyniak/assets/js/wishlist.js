import { isUserLoggedIn, isMyAccountPage } from "./utils";

const CONFIG = window.js_config;
const LOGIN_URL = CONFIG.urls.login;


function initWishlistScripts() {
    document.addEventListener("click", (e) => {
        // product favorite btn
        if (
            e.target &&
            e.target.classList.contains("ak-product-favorite-btn")
        ) {
            handleProductFavBtnClick(e.target);
        }
    });
}

function handleProductFavBtnClick(btnEl) {
    if (isUserLoggedIn()) {
        const productId = btnEl.dataset["product_id"];

        btnEl.classList.add("pending");

        if (btnEl.classList.contains("active")) {
            removeProductFromWishlist(productId).then(() => {
                console.log("removeProductFromWishlist");
                btnEl.classList.remove("active");
                btnEl.classList.remove("pending");

                if (isMyAccountPage()) {
                    const productEl = btnEl.closest(".ak-product-item");

                    productEl.remove();
                }
            });
        } else {
            addProductToWishlist(productId).then(() => {
                console.log("addProductToWishlist");
                btnEl.classList.add("active");
                btnEl.classList.remove("pending");
            });
        }
    } else {
        location.replace(LOGIN_URL);
    }
}

function addProductToWishlist(productId) {
    const form = new FormData();
    form.append("action", "add_to_wishlist");
    form.append("product_id", productId);
    const convertedParams = new URLSearchParams(form);

    return fetch(CONFIG.ajax_url, {
        method: "POST",
        credentials: "same-origin",
        body: convertedParams,
    }).then((response) => response.json());
}

function removeProductFromWishlist(productId) {
    const form = new FormData();
    form.append("action", "remove_from_wishlist");
    form.append("product_id", productId);
    const convertedParams = new URLSearchParams(form);

    return fetch(CONFIG.ajax_url, {
        method: "POST",
        credentials: "same-origin",
        body: convertedParams,
    }).then((response) => response.json());
}

export { initWishlistScripts };
