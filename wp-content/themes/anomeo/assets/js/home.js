import Swiper from "swiper/bundle";

import { emailIsValid } from "./utils";

const CONFIG = window.js_config;

function initHomePageSliders() {
    const homeTopSlider = new Swiper(".home-top-slider", {
        direction: 'vertical',
        spaceBetween: 0,
        loop: true,
        freeMode: true,
        speed: 800,
        // effect: 'creative',
        // creativeEffect: {
        //   prev: {
        //     // will set `translateZ(-400px)` on previous slides
        //     translate: [0, 0, -400],

        //   },
        //   next: {
        //     // will set `translateX(100%)` on next slides
        //     translate: ['100%', 0, 0],
        //   },
        // },
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".fullwidth-slider__button-next",
            prevEl: ".fullwidth-slider__button-prev",
        },
    });

    const homeSecondSlider = new Swiper(".home-second-slider", {
        spaceBetween: 0,
        loop: true,
        cssWidthAndHeight: true,
        allowTouchMove: true,
        speed: 800,
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".fullwidth-slider__button-next",
            prevEl: ".fullwidth-slider__button-prev",
        },
    });

    const homeProductsSlider = new Swiper(".home-products-slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        cssWidthAndHeight: true,
        allowTouchMove: true,
        speed: 600,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: ".products-slider__button-next",
            prevEl: ".products-slider__button-prev",
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
            },
        },
    });

    const homePopularProductsSlider = new Swiper(".popular-product", {
        slidesPerView: 'auto',
        navigation: {
            nextEl: ".popular-products-slider__button-next",
            prevEl: ".popular-products-slider__button-prev",
        },
        
    });
}

function initSygnetLogoScroll() {
    const sygnetLogoEl = document.querySelector(".sygnet-logo-banner");

    const addScrolledClass = () => {
        const currentScrollPos = window.pageYOffset;

        if (currentScrollPos >= window.innerHeight) {
            sygnetLogoEl.classList.add("scrolled");
        } else {
            sygnetLogoEl.classList.remove("scrolled");
        }
    };

    if (sygnetLogoEl) {
        sygnetLogoEl.classList.add("init");

        addScrolledClass();

        window.addEventListener("scroll", addScrolledClass, {
            passive: true,
        });
    }
}

function initNewsletterScripts() {
    const newsletterSectionEl = document.querySelector(".newsletter-section");
    const newsletterOpenFormBtn = document.getElementById(
        "newsletter-open-form-btn"
    );

    if (newsletterSectionEl) {
        newsletterOpenFormBtn.addEventListener("click", (e) => {
            e.preventDefault();

            newsletterSectionEl.classList.add("open");
        });

        const newsletterFormEl = document.querySelector(
            ".newsletter-section__form"
        );
        const formEmailInput = document.getElementById("newsletter_email");
        const consentCheckbox = document.getElementById("newsletter-consent");
        const newsletterSubmitBtnEl = document.getElementById(
            "newsletter-subscribe-btn"
        );

        newsletterFormEl.addEventListener("submit", (e) => {
            e.preventDefault();

            if (consentCheckbox && consentCheckbox.checked) {
                const email = formEmailInput.value;

                if (emailIsValid(email)) {
                    addNewsletterSubscriber(email).then((res) => {
                        if (res.error && res.error == 12) {
                        }
                        newsletterSectionEl.classList.remove("open");
                    });
                }
            }
        });

        consentCheckbox.addEventListener("change", (e) => {
            if (e.target.checked) {
                newsletterSubmitBtnEl.classList.remove("disabled");
            } else {
                newsletterSubmitBtnEl.classList.add("disabled");
            }
        });

        formEmailInput.addEventListener("change", (e) => {
            if (e.target.value.trim() && emailIsValid(e.target.value)) {
                formEmailInput.classList.remove("invalid");
            } else {
                formEmailInput.classList.add("invalid");
            }
        });

        formEmailInput.addEventListener("input", (e) => {
            if (e.target.value.trim() && emailIsValid(e.target.value)) {
                formEmailInput.classList.remove("invalid");
            }
        });

        const emailInputEl = document.getElementById("newsletter_email");
        emailInputEl.addEventListener("input", (e) => {
            if (e.target.value !== "") {
                newsletterFormEl.classList.add("changed");
            } else {
                newsletterFormEl.classList.remove("changed");
            }
        });
    }
}

function addNewsletterSubscriber(email) {
    const form = new FormData();
    form.append("action", "newslettersubscribe");
    form.append("email", email);
    const convertedParams = new URLSearchParams(form);

    return fetch(CONFIG.ajax_url, {
        method: "POST",
        credentials: "same-origin",
        body: convertedParams,
    }).then((response) => response.json());
}

function FAQScript(){
    jQuery( ".faq_btn.open, .footer-list-item.faq" ).click(function() {
        jQuery('#openModal').addClass('_active');
    });
    jQuery( ".faq_btn.close" ).click(function() {
        jQuery('#openModal').removeClass('_active');
    });

    jQuery( ".question_block .question" ).click(function() {
        jQuery(this).parent().addClass('show');
        jQuery('.question_block').addClass('hide');
        jQuery('.faq_title').hide();
        jQuery('.faq-footer').addClass('show');
        jQuery('.faq_question').addClass('open');

        jQuery(this).parent().next().addClass('next');

        if(jQuery('.question_block').hasClass('next')){
            jQuery('.question_block.next .question').after('<div class="next_question"><img src="/wp-content/themes/anomeo/assets/img/Arrow_FaQ-06.svg">Next question</div>');
            
            jQuery( ".question_block.next .question" ).click(function() {
                jQuery(this).parent().removeClass('next');
                jQuery(this).parent().prev('.question_block').removeClass('show');
            });
        }

        jQuery(this).parent().find('.answer p').addClass("animate__animated animate__fadeInUp");
        jQuery(this).parent().find('.question').addClass("animate__animated animate__fadeInUp");
        jQuery('.back').addClass("animate__animated animate__fadeInUp");
   });

   

    jQuery( ".question_block.next .next_question" ).click(function() {
        jQuery(this).parent().addClass('show');
        jQuery('.question_block').addClass('hide');
        jQuery('.faq_title').hide();
        jQuery('.faq-footer').addClass('show');
        jQuery('.faq_question').addClass('open');
        jQuery('.back').addClass("animate__animated animate__fadeInUp");
        

        jQuery(this).parent().next().addClass('next');

        jQuery('.answer p').addClass("animate__animated animate__fadeInUp");
        jQuery('.question').addClass("animate__animated animate__fadeInUp");

        if(jQuery('.question_block').hasClass('next')){
            jQuery('.question_block.next .question').after('<div class="next_question"><img src="/wp-content/themes/anomeo/assets/img/Arrow_FaQ-06.svg">Next question</div>');
            
            jQuery( ".question_block.next .question" ).click(function() {
                jQuery(this).parent().removeClass('next');
                jQuery(this).parent().prev('.question_block').removeClass('show');
            });
        }
    });

    

    jQuery(".faq-footer .back").click(function() {
        jQuery('.faq_title').show();
        jQuery('.question_block').removeClass('hide');
        jQuery('.question_block').removeClass('show');
        jQuery('.faq-footer').removeClass('show');
        jQuery('.faq_question').removeClass('open');
        jQuery('.question_block').removeClass('next');
        jQuery('.answer p').removeClass("animate__animated animate__fadeInUp");
        jQuery('.question').removeClass("animate__animated animate__fadeInUp");
        jQuery('.back').removeClass("animate__animated animate__fadeInUp");
    });
}

function animateStory() {
    var scrollPrev = 0;

    jQuery(window).scroll(function () {
        var scrolled = jQuery(window).scrollTop();

        if (scrolled > 300 && scrolled > scrollPrev) {
            jQuery(".boxes-row .home_text--title").addClass("animate__animated animate__fadeInUp animate__delay-5ms");
            jQuery(".home_text--content .first").addClass("animate__animated animate__fadeInUp animate__delay-1s");
            jQuery(".home_text--content .second").addClass("animate__animated animate__fadeInUp animate__delay-2s");
            jQuery(".home_text--content .third").addClass("animate__animated animate__fadeInUp animate__delay-3s");

            
        }
        scrollPrev = scrolled;
    });
}

function mobileText(){
    jQuery(document).ready(function () {
        jQuery(window).on("resize", function (e) {
            checkScreenSize();
        });
    
        checkScreenSize();
        
        function checkScreenSize(){
            var newWindowWidth = jQuery(window).width();
            if (newWindowWidth < 768) {
                jQuery(".home_text--content .first").each(function() {
                    var getContent=jQuery(this).text();
                    var newString=getContent.replace('HUMBLE BEGINNINGS','<span class="color_bg orange">HUMBLE</span><br /> BEGINNINGS');
                    jQuery(this).html(newString);

                    
                });
            }
            else
            {
                jQuery('.left').insertBefore('.right');
            }
        }
    });
}

function hoverImg(){
    function reveal() {
        var reveals = document.querySelectorAll(".home-blocks .fullwidth-slider__item");
      
        for (var i = 0; i < reveals.length; i++) {
          var windowHeight = window.innerHeight;
          var elementTop = reveals[i].getBoundingClientRect().top;
          var elementVisible = 75;
      
          if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
          } else {
            reveals[i].classList.remove("active");
          }
        }
      }
      
      window.addEventListener("scroll", reveal);
}

function initHomePageScripts() {
    initHomePageSliders();
    // initNewsletterScripts();
    initSygnetLogoScroll();
    FAQScript();
    animateStory();
    mobileText();
    hoverImg()
}   

export { initHomePageScripts };

