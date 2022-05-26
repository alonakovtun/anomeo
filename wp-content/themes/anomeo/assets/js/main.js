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

        if (jQuery(".filter-row-popup").hasClass("open")) {
            alert("open");
        }

        var PopUpCookie = getCookie("MyPopUpCookie");
        if (PopUpCookie == "") {
            jQuery(".newsletter-section").show();
        } else {
            jQuery(".newsletter-section").hide();
        }

        jQuery(".newsletter-section .btn-close").on("click", function () {
            jQuery(".newsletter-section").hide();
            setCookie("MyPopUpCookie", "hide");
        });

        function setCookie(cname, cvalue) {
            var d = new Date();
            d.setTime(d.getTime() + 24 * 60 * 60 * 1000);
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") c = c.substring(1);
                if (c.indexOf(name) == 0)
                    return c.substring(name.length, c.length);
            }
            return "";
        }

        jQuery('.open__newsletter').click(function() {
            jQuery(this).hide();
            jQuery('.form-newsletter').show();
        })
    });
})();
