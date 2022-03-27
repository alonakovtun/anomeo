import customSelect from "custom-select";
import Swiper from "swiper/bundle";
import PhotoSwipe from "photoswipe";
import PhotoSwipeUI_Default from "photoswipe/dist/photoswipe-ui-default";

import { toggleCartPopup } from "./header";

const CONFIG = window.js_config;

let singleProductSliderEl;

function addToCartScripts() {
    variableAddToCartScripts();
    simpleAddToCartScripts();
}

function simpleAddToCartScripts() {
    const productAddToCartFormEl = document.querySelector(
        ".ak-product__add-to-cart-form"
    );

    if (productAddToCartFormEl) {
        productAddToCartFormEl.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(e.target);

            addItemToCart(formData);
        });
    }
}

function variableAddToCartScripts() {
    const productVariationsFormEl = document.querySelector(
        ".ak-product__variations_form"
    );
    const productVariationSelectEl = document.querySelector(
        ".ak-product__variation-select"
    );
    const variationIdInputEl = document.querySelector(
        'input[name="variation_id"]'
    );
    const addToCartBtnEl = document.querySelector(
        "button.single_add_to_cart_button"
    );

    function toggleAddToCartBtnState(isDisabled, isInStock) {
        if (isDisabled) {
            addToCartBtnEl.classList.add("disabled");
        } else {
            addToCartBtnEl.classList.remove("disabled");
        }

        addToCartBtnEl.innerHTML = isInStock
            ? addToCartBtnEl.dataset["btn_text"]
            : CONFIG.translations["not_available"];

        addToCartBtnEl.disabled = isDisabled;
    }

    function getChoosenAttributes() {
        const productAttributesFieldsEls =
            document.querySelectorAll(".variations select");

        let data = {};

        productAttributesFieldsEls.forEach((el) => {
            const attrObj = {
                attributeName: el.dataset["attribute_name"],
                value: el.value || "",
            };

            data[attrObj.attributeName] = attrObj.value;
        });

        return data;
    }

    function findMatchingVariations(variations, attributes) {
        function isMatch(variation_attributes, attributes) {
            let match = true;
            for (let attr_name in variation_attributes) {
                if (variation_attributes.hasOwnProperty(attr_name)) {
                    let val1 = variation_attributes[attr_name];
                    let val2 = attributes[attr_name];
                    if (
                        val1 !== undefined &&
                        val2 !== undefined &&
                        val1.length !== 0 &&
                        val2.length !== 0 &&
                        val1 !== val2
                    ) {
                        match = false;
                    }
                }
            }
            return match;
        }

        let matching = [];
        for (let i = 0; i < variations.length; i++) {
            let variation = variations[i];

            if (isMatch(variation.attributes, attributes)) {
                matching.push(variation);
            }
        }
        return matching;
    }

    if (productVariationsFormEl) {
        const productVariations = JSON.parse(
            productVariationsFormEl.dataset.product_variations
        );

        // init custom select element
        customSelect(productVariationSelectEl);

        productVariationSelectEl.addEventListener("change", function (e) {
            const { value: variationSlug } = e.target;

            if (!variationSlug) {
                // in case empty option selected exit
                toggleAddToCartBtnState(true, true);
                return;
            }

            const choosenAttributes = getChoosenAttributes();
            const matchingVariations = findMatchingVariations(
                productVariations,
                choosenAttributes
            );

            if (matchingVariations.length > 0) {
                const matchingVariation = matchingVariations[0];
                const isInStock = matchingVariations[0].is_in_stock;

                if (
                    matchingVariation.image &&
                    matchingVariation.image.full_src
                ) {
                    findSlideBySrcAndNavigate(matchingVariation.image.full_src);
                }

                toggleAddToCartBtnState(!isInStock, isInStock);
                variationIdInputEl.value = isInStock
                    ? matchingVariations[0].variation_id
                    : null;
            }
        });

        productVariationsFormEl.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(e.target);

            addItemToCart(formData);
        });
    }
}

function findSlideBySrcAndNavigate(src) {
    if (singleProductSliderEl) {
        const imageWithSrc = document.querySelector(
            `.single-product-slider__item img[src="${src}"]`
        );

        if (imageWithSrc) {
            const slide = imageWithSrc.parentElement;
            const slideIndex = Number(slide.dataset["swiperSlideIndex"]);
            singleProductSliderEl.slideToLoop(slideIndex);
        }
    }
}

function addItemToCart(formData) {
    fetch(
        wc_add_to_cart_params.wc_ajax_url
            .toString()
            .replace("%%endpoint%%", "ak_add_to_cart"),
        {
            method: "POST",
            credentials: "same-origin",
            body: formData,
        }
    )
        .then((response) => response.json())
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

            toggleCartPopup(true);
        });
}

function gallerySliderScripts() {
    singleProductSliderEl = new Swiper(".single-product-slider", {
        spaceBetween: 0,
        loop: true,
        allowTouchMove: true,
        navigation: {
            nextEl: ".single-product-slider__button-next",
        },
        on: {
            init: () => {
                setTimeout(() => initPhotoSwipeImageGallery(), 300);
            },
        },
    });
}

function additionalInfoItemsScripts() {
    const productInfoEls = document.querySelectorAll(".product-info-item");
    const descriptionPopoverEl = document.querySelector(".description-popover");
    const addInfoContinerEl = document.querySelector(
        ".ak-product__additional-info"
    );

    if (descriptionPopoverEl) {
        const titleEl = descriptionPopoverEl.querySelector(".title");
        const descriptionEl =
            descriptionPopoverEl.querySelector(".description");

        productInfoEls.forEach((el) => {
            el.addEventListener("click", (e) => {
                e.preventDefault();

                const closestItem = e.target.closest(".product-info-item");

                const titleText = closestItem.dataset["title"];
                const descriptionText = closestItem.dataset["description"];

                addInfoContinerEl.classList.add("description-open");
                descriptionPopoverEl.classList.add("open");
                titleEl.textContent = titleText;
                descriptionEl.innerHTML = descriptionText;
            });
        });

        titleEl.addEventListener("click", (e) => {
            e.preventDefault();

            addInfoContinerEl.classList.remove("description-open");
            descriptionPopoverEl.classList.remove("open");
            titleEl.textContent = "";
            descriptionEl.innerHTML = "";
        });
    }
}

function relatedProductsSlider() {
    if (window.matchMedia("(max-width: 576px)").matches) {
        const relatedProductsSlider = new Swiper(".mobile-products-slider", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            cssWidthAndHeight: true,
            allowTouchMove: true,
            speed: 600,
            autoplay: {
                delay: 5000,
            },
        });
    }
}

const parseThumbnailElements = function (el) {
    let thumbElements = el.querySelectorAll(".single-product-slider__item");
    let items = [];

    thumbElements.forEach((itemEl) => {
        const imgEl = itemEl.querySelector("img");

        const width = imgEl.getAttribute("width");
        const height = imgEl.getAttribute("height");

        // create slide object
        let item = {
            src: imgEl.getAttribute("src"),
            w: parseInt(width, 10),
            h: parseInt(height, 10),
        };

        if (itemEl.children.length > 1) {
            // <figcaption> content
            item.title = itemEl.children[1].innerHTML;
        }

        item.msrc = imgEl.getAttribute("src");

        item.el = imgEl;
        items.push(item);
    });

    return items;
};

const openPhotoSwipe = (index, galleryElement, disableAnimation) => {
    const pswpElement = document.querySelectorAll(".pswp")[0];
    let items = parseThumbnailElements(galleryElement);

    let options = {};

    options.index = parseInt(index, 10);

    // exit if index not found
    if (isNaN(options.index)) {
        return;
    }

    if (disableAnimation) {
        options.showAnimationDuration = 0;
    }

    // Pass data to PhotoSwipe and initialize it
    const gallery = new PhotoSwipe(
        pswpElement,
        PhotoSwipeUI_Default,
        items,
        options
    );
    gallery.init();
};

function initPhotoSwipeImageGallery() {
    const gallEl = document.querySelector(
        ".single-product-slider .swiper-wrapper"
    );

    if (gallEl) {
        const gallItemEls = document.querySelectorAll(
            ".single-product-slider .single-product-slider__item"
        );

        gallItemEls.forEach((el, index) => {
            el.addEventListener("click", (e) => {
                e.preventDefault();

                openPhotoSwipe(index, gallEl, false, false);
            });
        });
    }
}

function initSingleProductPageScripts() {
    addToCartScripts();
    gallerySliderScripts();
    additionalInfoItemsScripts();
    relatedProductsSlider();
    // initPhotoSwipeImageGallery();
}

export { initSingleProductPageScripts };
