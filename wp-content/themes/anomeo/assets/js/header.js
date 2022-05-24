import anime from "animejs/lib/anime.es.js";

import { isCheckoutPage, isHomePage } from "./utils";

const TOP_BANNER_LS_KEY = "akTopBannerClosed";

const CONFIG = window.js_config;

let activeHeaderPopup;

function initStartupAnimation() {
    const transitionContainerEl = document.querySelector(".site-main");

    anime({
        targets: transitionContainerEl,
        opacity: 1,
        duration: 600,
        easing: "easeInQuad",
    });
}

function initSiteTopBannerScripts() {
    const topBannerEl = document.querySelector(".site-top-banner");

    if (topBannerEl) {
        const bannerClosedByUser = localStorage.getItem(TOP_BANNER_LS_KEY);

        if (!bannerClosedByUser) {
            document.body.classList.add("top-banner-open");

            const closeBtnEl = topBannerEl.querySelector(".close-btn");

            if (closeBtnEl) {
                closeBtnEl.addEventListener("click", (e) => {
                    e.preventDefault();

                    document.body.classList.remove("top-banner-open");

                    localStorage.setItem(TOP_BANNER_LS_KEY, true);
                });
            }
        }
    }
}

function initSiteCookiesBannerScripts() {
    const cookiesBannerEl = document.querySelector(".site-cookies-banner");

    if (cookiesBannerEl) {
        const bannerClosedByUser = localStorage.getItem(
            "ak_cookies_banner_closed"
        );

        if (!bannerClosedByUser) {
            document.body.classList.add("cookies-banner-open");

            const closeBtnEl = cookiesBannerEl.querySelector(".close-btn");

            closeBtnEl.addEventListener("click", (e) => {
                e.preventDefault();

                document.body.classList.remove("cookies-banner-open");

                localStorage.setItem("ak_cookies_banner_closed", true);
            });
        }
    }
}

function headerHideOnScrollAnimation() {
    var header = jQuery(".site-header"),
        scrollPrev = 0;

    jQuery(window).scroll(function () {
        var scrolled = jQuery(window).scrollTop();

        if (scrolled > 100 && scrolled > scrollPrev) {
            header.addClass("out");
        } else {
            header.removeClass("out");
        }
        scrollPrev = scrolled;
    });

    // const headerEl = document.querySelector("#masthead");
    // const topBannerEl = document.querySelector(".site-top-banner");

    // let prevScrollpos = window.pageYOffset;

    // window.addEventListener(
    //     "scroll",
    //     () => {
    //         let currentScrollPos = window.pageYOffset;

    //         if (currentScrollPos >= window.innerHeight && !activeHeaderPopup) {
    //             if (prevScrollpos >= currentScrollPos) {
    //                 headerEl.classList.remove("hidden");
    //                 topBannerEl.classList.remove("hidden");
    //             } else {
    //                 headerEl.classList.add("hidden");
    //                 topBannerEl.classList.add("hidden");
    //             }
    //             prevScrollpos = currentScrollPos;
    //         }
    //     },
    //     { passive: true }
    // );
}

function flipAnimateBigLogoTransition() {
    const logoEl = document.querySelector(".site-header__logo-col .logo");
    const bigLogoEl = document.querySelector(
        ".site-header__logo-col .big-logo"
    );

    const first = logoEl.getBoundingClientRect();
    const last = bigLogoEl.getBoundingClientRect();

    // Invert: determine the delta between the
    // first and last bounds to invert the element
    const deltaX = first.left - last.left;
    const deltaY = first.top - last.top;
    const deltaW = first.width / last.width;
    const deltaH = first.height / last.height;

    if (!bigLogoEl.classList.contains("transitioned")) {
        anime({
            targets: bigLogoEl,
            translateX: deltaX,
            translateY: deltaY,
            scaleX: deltaW,
            scaleY: deltaH,
            duration: 400,
            easing: "easeOutQuad",
        });

        bigLogoEl.classList.add("transitioned");
    }
}

function headerBigLogoAnimation() {
    if (isHomePage()) {
        if (window.pageYOffset > 0) {
            const headerEl = document.querySelector(".site-header");
            headerEl.classList.remove("site-header--big-logo-enabled");
        } else {
            const bigLogoEl = document.querySelector(
                ".site-header__logo-col .big-logo"
            );
            anime({
                targets: bigLogoEl,
                opacity: 1,
                duration: 250,
                easing: "easeInQuad",
            });
        }

        window.addEventListener(
            "scroll",
            () => {
                let currentScrollPos = window.pageYOffset;

                if (currentScrollPos >= 0) {
                    flipAnimateBigLogoTransition();
                }
            },
            { passive: true, once: true }
        );
    }
}

function initHeaderSubmenuHandlers() {
    const headerInnerEl = document.getElementById("header-inner");
    const menuItemsWithSubmenu = headerInnerEl.querySelectorAll(
        ".menu-item.menu-item-open > a"
    );
    const submenus = headerInnerEl.querySelectorAll(
        ".menu-item.menu-item-open .sub-menu"
    );
    menuItemsWithSubmenu.forEach((el) => {
        el.addEventListener("mouseover", (e) => {
            const parentEl = e.target.parentNode;
            const currentItemAlreadyOpen =
                parentEl.classList.contains("menu-open");

            closeActivePopup();

            if (!currentItemAlreadyOpen) {
                setAndOpenActivePopup(parentEl);
                parentEl.classList.add("menu-open");
            }
        });
    });

    submenus.forEach((el) => {
        el.addEventListener("mouseleave", (e) => {
            const parentEl = e.target.parentNode;
            const currentItemAlreadyOpen =
                parentEl.classList.contains("menu-open");

            if (currentItemAlreadyOpen) {
                closeActivePopup();
            }
        });
    });
}

function initSearchPopupHandlers() {
    const searchPopupToggleEl = document.querySelector("#search-toggle");
    const searchPopoupEl = document.querySelector(".site-header__search-popup");

    searchPopupToggleEl.addEventListener("click", (e) => {
        e.preventDefault();
        const popupAlredyOpen = searchPopoupEl.classList.contains("open");

        closeActivePopup();

        if (!popupAlredyOpen) {
            setAndOpenActivePopup(searchPopoupEl);
            searchPopoupEl.classList.add("open");
        }
    });
}

function initMultiLangPopupHandlers() {
    const multiLangPopupToggleEl = document.querySelector(
        "#multi-lang-popup-toggle"
    );
    const multiLangPopoupEl = document.querySelector(
        ".site-header__multi-lang-popup"
    );

    multiLangPopupToggleEl.addEventListener("click", (e) => {
        e.preventDefault();
        const popupAlredyOpen = multiLangPopoupEl.classList.contains("open");

        closeActivePopup();

        if (!popupAlredyOpen) {
            setAndOpenActivePopup(multiLangPopoupEl);
            multiLangPopoupEl.classList.add("open");
        }
    });
}

function toggleCartPopup(open) {
    const cartPopoupEl = document.querySelector(".site-header__cart-popup");

    closeActivePopup();

    if (open) {
        setAndOpenActivePopup(cartPopoupEl, true);
        cartPopoupEl.classList.add("open");
    }
}

function initCartPopupHandlers() {
    document.addEventListener("click", function (e) {
        if (e.target && e.target.id === "cart-popup-toggle") {
            e.preventDefault();
            const cartPopoupEl = document.querySelector(
                ".site-header__cart-popup"
            );
            const popupAlredyOpen = cartPopoupEl.classList.contains("open");

            toggleCartPopup(!popupAlredyOpen);
        }
    });
}

function initCartItemQtyButtonsHandlers() {
    document.addEventListener("click", function (e) {
        if (e.target && e.target.matches(".cart-item-qty-btn")) {
            e.preventDefault();
            e.stopPropagation();

            const cartItemKey = e.target.dataset["cart_item_key"];
            const cartItemCurrentQty = parseInt(
                e.target.dataset["cart_item_qty"]
            );

            const cartItemQty = e.target.classList.contains("plus-btn")
                ? cartItemCurrentQty + 1
                : cartItemCurrentQty - 1;

            if (cartItemQty === 0) {
                return;
            }

            const form = new FormData();
            form.append("action", "ak_update_cart_item_qty");
            form.append("cart_item_key", cartItemKey);
            form.append("qty", cartItemQty);
            const convertedParams = new URLSearchParams(form);

            fetch(CONFIG.ajax_url, {
                method: "POST",
                credentials: "same-origin",
                body: convertedParams,
            })
                .then((res) => res.json())
                .then((res) => {
                    if (!res) {
                        return;
                    }

                    // Trigger event so themes can refresh other areas.
                    jQuery(document.body).trigger("added_to_cart", [
                        res.fragments,
                        res.cart_hash,
                        null,
                    ]);

                    if (isCheckoutPage()) {
                        jQuery(document.body).trigger("update_checkout", {
                            update_shipping_method: false,
                        });
                    }
                });
        }
    });
}

function initMobileMenuScripts() {
    const mobileMenuToggleEl = document.getElementById("mobile-menu-toggle");
    const mobileMenuPopupEl = document.querySelector(".ak-mobile-menu-popup");
    const submenuContentPopup = mobileMenuPopupEl.querySelector(
        ".submenu-content-popup"
    );

    mobileMenuToggleEl.addEventListener("click", (e) => {
        e.preventDefault();

        const popupAlredyOpen = mobileMenuPopupEl.classList.contains("open");

        closeActivePopup();

        if (!popupAlredyOpen) {
            setAndOpenActivePopup(mobileMenuPopupEl);
            mobileMenuPopupEl.classList.add("open");
            mobileMenuToggleEl.classList.add("open");
        }
    });

    const menuItemsWithSubmenu = mobileMenuPopupEl.querySelectorAll(
        ".menu-item.menu-item-has-children"
    );
    menuItemsWithSubmenu.forEach((el) => {
        el.addEventListener("click", (e) => {
            e.preventDefault();

            const parentNode =
                e.target.tagName === "A" ? e.target.parentNode : e.target;
            const itemContent = parentNode
                .querySelector(".sub-menu")
                .cloneNode(true);

            // const contentEl = submenuContentPopup.querySelector(".content");
            // if (contentEl) {
            //     contentEl.innerHTML = "";

            //     contentEl.appendChild(itemContent);
            // }

            // submenuContentPopup.classList.add("open");
        });
    });

    // const submenuBackBtnEl = submenuContentPopup.querySelector(".back-btn");
    // submenuBackBtnEl.addEventListener("click", (e) => {
    //     e.preventDefault();

    //     submenuContentPopup.classList.remove("open");
    // });

    const mobileSearchInput = document.getElementById(
        "woocommerce-mobile-product-search-field"
    );
    // const mobileSearchForm = document.querySelector(".mobile-product-search");
    // mobileSearchInput.addEventListener("input", (e) => {
    //     if (e.target.value !== "") {
    //         mobileSearchForm.classList.add("modified");
    //     } else {
    //         mobileSearchForm.classList.remove("modified");
    //     }
    // });

    jQuery('.menu-item-has-children a').click(function(){
        jQuery(this).parent().find('.sub-menu').toggleClass('open');
        jQuery(this).parent().toggleClass('open');
        
    })
}

function togglePopupOverlay(enable, whiteBg) {
    const popupOverlayEl = document.querySelector(".ak-popups-overlay");

    if (whiteBg) {
        popupOverlayEl.classList.add("white-bg");
    }

    if (enable) {
        popupOverlayEl.classList.add("open");
    } else {
        popupOverlayEl.classList.remove("white-bg");
        popupOverlayEl.classList.remove("open");
    }
}

function setAndOpenActivePopup(popupEl, whiteBg) {
    const headerEl = document.querySelector("#masthead");
    headerEl.classList.remove("hidden");
    togglePopupOverlay(true, whiteBg);
    activeHeaderPopup = popupEl;
}

function closeActivePopup() {
    const mobileMenuToggleEl = document.getElementById("mobile-menu-toggle");
    const bigLogoEl = document.querySelector(
        ".site-header__logo-col .big-logo"
    );

    if (bigLogoEl) {
        flipAnimateBigLogoTransition();
    }

    if (mobileMenuToggleEl) {
        mobileMenuToggleEl.classList.remove("open");
    }
    if (activeHeaderPopup) {
        activeHeaderPopup.classList.remove("open");
        activeHeaderPopup.classList.remove("menu-open");
        activeHeaderPopup = null;
        togglePopupOverlay(false);
    }
}

function initPopupOverlayScripts() {
    const popupOverlayEl = document.querySelector(".ak-popups-overlay");

    popupOverlayEl.addEventListener("click", (e) => {
        e.preventDefault();

        closeActivePopup();
    });
}

function hideSearchScript() {

    const hideSearch = document.querySelector('.hide_search'),
    searchPopup = document.querySelector('.site-header__search-popup');
   
    hideSearch.addEventListener('click', (e) => {
        e.preventDefault();
        if(searchPopup.classList.contains('open')){
            searchPopup.classList.remove('open');
        }
    });
   
   }

function initHeaderScripts() {
    initStartupAnimation();
    headerHideOnScrollAnimation();
    headerBigLogoAnimation();
    initSiteTopBannerScripts();
    initSiteCookiesBannerScripts();
    initHeaderSubmenuHandlers();
    initSearchPopupHandlers();
    // initMultiLangPopupHandlers();
    initCartPopupHandlers();
    initCartItemQtyButtonsHandlers();
    initPopupOverlayScripts();
    initMobileMenuScripts();
    hideSearchScript();
}

export { initHeaderScripts, toggleCartPopup };
