import { isCheckoutPage } from "./utils";

const CONFIG = window.js_config;

function isHidden(el) {
    return el.offsetParent === null;
}

function initCheckoutLoginFormScripts() {
    const continueBtnEl = document.getElementById("continue-to-checkout-btn");

    if (continueBtnEl) {
        continueBtnEl.addEventListener("click", (e) => {
            e.preventDefault();

            const checkoutFormEl = document.querySelector(
                ".checkout.woocommerce-checkout"
            );

            checkoutFormEl.classList.remove("woocommerce-checkout--hidden");

            jQuery(".ak-checkout-login-form").slideUp();
        });
    }
}

function initCouponFormScripts() {
    const couponFormEl = document.getElementById("ajax-coupon-form");
    const couponFormTitleEl = document.querySelector(".coupon-form-title");
    const couponFormInputEl = document.getElementById("ajax-coupon-form-input");

    const couponSubmitBtnEl = document.getElementById(
        "ajax-coupon-form-submit-btn"
    );
    const couponCloseBtnEl = document.getElementById(
        "ajax-coupon-form-close-btn"
    );

    function submitCouponCode(couponCode) {
        const formData = new FormData();
        formData.append("security", wc_checkout_params.apply_coupon_nonce);
        formData.append("coupon_code", couponCode);

        fetch(
            wc_checkout_params.wc_ajax_url
                .toString()
                .replace("%%endpoint%%", "apply_coupon"),
            {
                method: "POST",
                credentials: "same-origin",
                body: formData,
            }
        )
            .then((res) => res.text())
            .then((res) => {
                if (!res) {
                    return;
                }

                if (res.includes("woocommerce-error")) {
                    const errorTextRegex = /<li>(.*?)<\/li>/gm;
                    const formattedRes = res.replace(/(\r\n|\n|\r|\t)/gm, "");
                    const found = formattedRes.match(errorTextRegex);

                    if (found.length > 0) {
                        const errorMessage = found[0].replace(
                            /(<([^>]+)>)/gi,
                            ""
                        );

                        couponFormInputEl.classList.add("error");
                        couponFormEl.textContent = errorMessage;
                        

                        return;
                    }
                }

                if (res) {
                    couponFormInputEl.value = "";

                    jQuery(document.body).trigger(
                        "applied_coupon_in_checkout",
                        [couponCode]
                    );
                    jQuery(document.body).trigger("update_checkout", {
                        update_shipping_method: false,
                    });
                }
            });
    }

    if (couponFormEl) {
        // open form on title click
        couponFormTitleEl.addEventListener("click", (e) => {
            e.preventDefault();

            if (!couponFormEl.classList.contains("open")) {
                couponFormEl.classList.add("open");
            }
        });

        couponFormInputEl.addEventListener("input", (e) => {
            if (e.target.value !== "") {
                couponFormEl.classList.add("modified");

                if (couponFormEl.classList.contains("error")) {
                    couponFormEl.classList.remove("error");
                    couponSubmitBtnEl.textContent =
                        CONFIG.translations["apply_coupon"];
                }
            } else {
                couponFormEl.classList.remove("modified");
            }
        });

        couponSubmitBtnEl.addEventListener("click", (e) => {
            e.preventDefault();

            if (couponFormInputEl.value.trim() !== "") {
                submitCouponCode(couponFormInputEl.value);
            }
        });

        couponCloseBtnEl.addEventListener("click", (e) => {
            e.preventDefault();

            if (couponFormEl.classList.contains("open")) {
                couponFormEl.classList.remove("open");
            }
        });
    }
}

function invoiceFieldsScript() {
    const invoiceFieldsTitleEl = document.getElementById(
        "invoice-fields-title"
    );

    if (invoiceFieldsTitleEl) {
        document.addEventListener("click", function (e) {
            if (e.target && e.target.id === "invoice-fields-title") {
                e.preventDefault();

                const invoiceFieldsTitleEl = document.getElementById(
                    "invoice-fields-title"
                );
                const invoiceFieldsEl = document.querySelector(
                    ".woocommerce-invoice-fields__fields-wrapper"
                );

                invoiceFieldsTitleEl.classList.toggle("open");

                if (isHidden(invoiceFieldsEl)) {
                    jQuery(
                        ".woocommerce-invoice-fields__fields-wrapper"
                    ).slideDown();
                } else {
                    jQuery(
                        ".woocommerce-invoice-fields__fields-wrapper"
                    ).hide();
                }
            }
        });
    }
}

function removeSubtotalRowsFromRightColumn() {
    function removeSubtotalsTemplatesFromDOM() {
        const subtotalsRightColEl = document.querySelector(
            ".ak-checkout-form__col--right .subtotals-list"
        );
        const paymentMethodsRightColEl = document.querySelector(
            ".ak-checkout-form__col--right .woocommerce-checkout-payment"
        );
        if (subtotalsRightColEl) {
            subtotalsRightColEl.remove();
        }
        if (paymentMethodsRightColEl) {
            paymentMethodsRightColEl.remove();
        }
    }

    jQuery(document.body).on(
        "update_checkout",
        removeSubtotalsTemplatesFromDOM
    );
    jQuery(document.body).on("init_checkout", removeSubtotalsTemplatesFromDOM);
}

function updateCheckoutOnCartUpdate() {
    if (isCheckoutPage()) {
        jQuery(document.body).on("removed_from_cart", function () {
            jQuery(document.body).trigger("update_checkout");
        });
    }
}

function initCheckoutConsentScripts() {
    jQuery(document).on("change", ".checkout-consent-checkbox", function () {
        const createOrderBtnEl = document.querySelector(
            ".ak-checkout-form__col--left button#place_order"
        );
        createOrderBtnEl.classList.toggle("disabled");
    });
}

function changeAddress() {
    jQuery(".business.item").click(function () {
        jQuery(".woocommerce-invoice-fields").css("display", "block");
        jQuery(".woocommerce-billing-fields__fields-wrapper").css(
            "display",
            "none"
        );
        jQuery(this).addClass("_active");
        jQuery(this).removeClass("_notactive");
        jQuery(".personal.item").addClass("_notactive");
    });

    jQuery(".personal.item").click(function () {
        jQuery(".woocommerce-invoice-fields").css("display", "none");
        jQuery(".woocommerce-billing-fields__fields-wrapper").css(
            "display",
            "block"
        );
        jQuery(this).addClass("_active");
        jQuery(this).removeClass("_notactive");
        jQuery(".business.item").addClass("_notactive");
    });
}

function couponCode(){
    jQuery("#ajax-coupon-form-input").on("input", function() {
        if (jQuery(this).val()) {
          jQuery("#ajax-coupon-form-submit-btn").show();
          jQuery(this).css("background-color", "#128793");
        } else {
          jQuery("#ajax-coupon-form-submit-btn").hide();
        }
      });
      jQuery("#ajax-coupon-form-submit-btn").click(function() {
        jQuery("#ajax-coupon-form-input").val('');
        jQuery(this).hide();
      });
}

function shippingImg(){
    jQuery(".shipping-open span").click(function() {
        jQuery('.shipping-img').toggleClass('_active');
    })
}

function paymentMethod(){
    jQuery(".payment-method__title").addClass('test');
    jQuery(".wc_payment_method").click(function() {
        jQuery(".payment-method__title").addClass('test');
    })

    var getContent=jQuery('#wcpay-payment-request-button-separator').text();
    var newString=getContent.replace('— OR —','or');
    jQuery('#wcpay-payment-request-button-separator').html(newString);
    
}

function initCheckoutPageScripts() {
    initCheckoutLoginFormScripts();
    initCouponFormScripts();
    invoiceFieldsScript();
    removeSubtotalRowsFromRightColumn();
    updateCheckoutOnCartUpdate();
    initCheckoutConsentScripts();
    changeAddress();
    couponCode();
    shippingImg();
    paymentMethod();
}

export { initCheckoutPageScripts };

