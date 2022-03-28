import { removeEmptyValuesFromObject } from "./utils";

const CONFIG = window.js_config;

function initBlogPostsPagination() {
    const postsGridEl = document.querySelector(".blog-page__blog-items");

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

                        toggleLoader(true);

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
                                toggleLoader(false);
                            })
                            .catch(() => {
                                toggleLoader(false);
                            });
                    }
                },
                { passive: true }
            );
        }
    }
}

function toggleLoader(state) {
    const postsGridEl = document.querySelector(".blog-page__blog-items");

    if (state) {
        const loader = document.createElement("div");
        loader.classList.add("yith-infs-loader");

        postsGridEl.append(loader);
    } else {
        const loader = document.querySelector(
            ".blog-page__blog-items .yith-infs-loader"
        );

        loader.remove();
    }
}

function initArchivePostsScripts() {
    initBlogPostsPagination();
}

export { initArchivePostsScripts };
