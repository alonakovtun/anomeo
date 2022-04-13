import { ready } from "./utils";
import { initHeaderScripts } from "./header";
import { initHomePageScripts } from "./home";
import { initSingleProductPageScripts } from "./single-product";
import { initArchiveProductsScripts } from "./archive-products";
import { initArchivePostsScripts } from "./blog";
import { initCareGuidePageScripts } from "./care-guide";
import { initCheckoutPageScripts } from "./checkout";
import { initMyAccountPageScripts} from "./my-account";
import { initWishlistScripts } from "./wishlist";
import { initPressPageScripts } from "./press";

(function () {
    ready(() => {
        initHeaderScripts();

        initHomePageScripts();

        initSingleProductPageScripts();

        initArchiveProductsScripts();

        initArchivePostsScripts();

        initPressPageScripts();

        initCareGuidePageScripts();

        initCheckoutPageScripts();

        initMyAccountPageScripts();

        initWishlistScripts();


    });

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

})();
