import Swiper from "swiper/bundle";

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

    jQuery('.button__trigger-register').click(function(){
        jQuery('.login-box').css('display', 'none');
        jQuery('.register-box').css('display', 'block');
    })
}

function swiperOrder(){
    const orderSlider = new Swiper(".swiper-order", {
        slidesPerView: 1,
        spaceBetween: 0,
        allowTouchMove: true,
        navigation: {
            nextEl: ".order-slider__button-next",
            prevEl: ".order-slider__button-prev",
        },
        
    });
}

function initMyAccountPageScripts() {
    initCheckoutLoginFormScripts();
    swiperOrder();
    showRegisterScripts();
}

export { initMyAccountPageScripts };
