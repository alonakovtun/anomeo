import PhotoSwipe from "photoswipe";
import PhotoSwipeUI_Default from "photoswipe/dist/photoswipe-ui-default";

import { removeEmptyValuesFromObject } from "./utils";

const CONFIG = window.js_config;

function initPressPostsPagination() {
    const postsGridEl = document.querySelector(".press-page__items-grid");

    const paginationState = {
        paged: 1,
        canBeLoaded: true,
        bottomOffset: 500,
    };

    if (postsGridEl) {
        const paginationConfig = removeEmptyValuesFromObject(
            JSON.parse(postsGridEl.dataset.config)
        );
        const totalPages = postsGridEl.dataset["total_pages"] || 1;

        if (totalPages > 1) {
            window.addEventListener(
                "scroll",
                () => {
                    if (
                        document.documentElement.scrollTop +
                            window.innerHeight >
                            document.body.scrollHeight -
                                paginationState.bottomOffset &&
                        paginationState.canBeLoaded === true &&
                        paginationState.paged < totalPages
                    ) {
                        const requestData = {
                            action: "loadmore",
                            query_params: {
                                ...paginationConfig,
                                paged: paginationState.paged + 1,
                            },
                        };

                        const form = new FormData();
                        form.append("action", requestData.action);
                        form.append(
                            "query_params",
                            JSON.stringify(requestData.query_params)
                        );
                        const convertedParams = new URLSearchParams(form);

                        paginationState.canBeLoaded = false;

                        fetch(CONFIG.ajax_url, {
                            method: "POST",
                            credentials: "same-origin",
                            body: convertedParams,
                        })
                            .then((res) => res.text())
                            .then((html) => {
                                if (html.trim()) {
                                    postsGridEl.insertAdjacentHTML(
                                        "beforeend",
                                        html
                                    );

                                    paginationState.canBeLoaded = true;
                                    paginationState.paged++;
                                }
                            });
                    }
                },
                { passive: true }
            );
        }
    }
}

const parseThumbnailElements = function (el) {
    let thumbElements = el.querySelectorAll(".ak-press-item");
    let items = [];

    thumbElements.forEach((itemEl) => {
        const imgEl = itemEl.querySelector("img");

        const linkEl = itemEl.querySelector("a");

        const size = linkEl.getAttribute("data-size").split("x");

        // create slide object
        let item = {
            src: linkEl.getAttribute("href"),
            w: parseInt(size[0], 10),
            h: parseInt(size[1], 10),
        };

        if (itemEl.children.length > 1) {
            // <figcaption> content
            item.title = itemEl.children[1].innerHTML;
        }

        if (linkEl.children.length > 0) {
            // <img> thumbnail element, retrieving thumbnail url
            item.msrc = imgEl.getAttribute("src");
        }

        item.el = imgEl;
        items.push(item);
    });

    return items;
};

const openPhotoSwipe = (index, galleryElement, disableAnimation) => {
    const pswpElement = document.querySelectorAll(".pswp")[0];
    let items = parseThumbnailElements(galleryElement);

    // define options (if needed)
    let options = {
        // define gallery index (for URL)
        // galleryUID: galleryElement.getAttribute("data-pswp-uid"),

        // getThumbBoundsFn: function (index) {
        //     // See Options -> getThumbBoundsFn section of documentation for more info
        //     var thumbnail = items[index].el, // find thumbnail
        //         pageYScroll =
        //             window.pageYOffset || document.documentElement.scrollTop,
        //         rect = thumbnail.getBoundingClientRect();

        //     return {
        //         x: rect.left,
        //         y: rect.top + pageYScroll,
        //         w: rect.width,
        //     };
        // },
    };

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

function initImageGallery() {
    const gallEl = document.querySelector(".press-page__items-grid");

    if (gallEl) {
        const gallItemEls = document.querySelectorAll(".ak-press-item");

        gallItemEls.forEach((el, index) => {
            el.addEventListener("click", (e) => {
                e.preventDefault();

                openPhotoSwipe(index, gallEl, false, false);
            });
        });
    }
}

function initPressPageScripts() {
    // initPressPostsPagination();

    initImageGallery();
}

export { initPressPageScripts };
