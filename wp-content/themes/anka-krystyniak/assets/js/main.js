import { ready } from "./utils";
import { initHeaderScripts } from "./header";
import { initHomePageScripts } from "./home";
import { initSingleProductPageScripts } from "./single-product";
import { initArchiveProductsScripts } from "./archive-products";
import { initArchivePostsScripts } from "./blog";
import { initCareGuidePageScripts } from "./care-guide";
import { initCheckoutPageScripts } from "./checkout";
import { initMyAccountPageScripts } from "./my-account";
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
})();
