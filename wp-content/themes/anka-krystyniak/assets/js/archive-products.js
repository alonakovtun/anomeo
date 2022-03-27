import { removeEmptyValuesFromObject } from "./utils";

const CONFIG = window.js_config;
const GRID_VIEW_LOCALSTORAGE_KEY = "ak-grid-view-cols";

function getCurrentGridColsNumber(gridEl) {
    return gridEl.classList.contains("ak-products__grid--2-cols") ? 2 : 4;
}

function changeGridColsNumber(gridEl, colsNumber) {
    // localStorage.setItem(GRID_VIEW_LOCALSTORAGE_KEY, colsNumber);
    if (colsNumber === 2) {
        gridEl.classList.replace(
            "ak-products__grid--4-cols",
            "ak-products__grid--2-cols"
        );
    } else {
        gridEl.classList.replace(
            "ak-products__grid--2-cols",
            "ak-products__grid--4-cols"
        );
    }
}

function initGridViewToggle() {
    const gridViewTglBtnEl = document.getElementById(
        "product-grid-view-toggle"
    );

    if (gridViewTglBtnEl) {
        gridViewTglBtnEl.addEventListener("click", (e) => {
            e.preventDefault();

            const gridEl = document.querySelector(".ak-products__grid");
            const currentGridCols = getCurrentGridColsNumber(gridEl);

            changeGridColsNumber(gridEl, currentGridCols === 2 ? 4 : 2);
        });
    }
}

function initSortScripts() {
    const sortToggleBtn = document.getElementById("sort-toggle-btn");
    const sortInputs = document.querySelectorAll('input[name="orderby"]');
    const activeSortItemEl = document.querySelector(".active-orderby-option");

    if (sortToggleBtn) {
        sortToggleBtn.addEventListener("click", (e) => {
            e.preventDefault();

            const sortPopupEl = document.querySelector(".ak-sort-popup");
            const filtersPopupEl = document.querySelector(".ak-filters-popup");

            if (filtersPopupEl && filtersPopupEl.classList.contains("open")) {
                filtersPopupEl.classList.remove("open");
            }

            if (sortPopupEl) {
                sortToggleBtn.textContent = sortPopupEl.classList.contains(
                    "open"
                )
                    ? CONFIG.translations["sort"]
                    : CONFIG.translations["close_sort"];

                sortPopupEl.classList.toggle("open");
            }
        });

        // submit sort form on radio input change
        sortInputs.forEach((el) => {
            el.addEventListener("change", (e) => {
                const formEl = document.querySelector(
                    "form.woocommerce-ordering"
                );

                formEl.submit();
            });
        });
    }

    if (activeSortItemEl) {
        activeSortItemEl.addEventListener("click", (e) => {
            const formEl = document.querySelector("form.woocommerce-ordering");
            const defaultOrderItem = document.querySelector("input#menu_order");
            defaultOrderItem.checked = true;

            formEl.submit();
        });
    }
}

function initFilterScripts() {
    const filterToggleBtn = document.getElementById("filter-toggle-btn");
    const filterWidgetEls = document.querySelectorAll(".ak-filter-widget");

    if (filterToggleBtn) {
        filterToggleBtn.addEventListener("click", (e) => {
            e.preventDefault();

            const filtersPopupEl = document.querySelector(".ak-filters-popup");
            const sortPopupEl = document.querySelector(".ak-sort-popup");

            if (sortPopupEl && sortPopupEl.classList.contains("open")) {
                sortPopupEl.classList.remove("open");
            }

            if (filtersPopupEl) {
                filterToggleBtn.textContent = filtersPopupEl.classList.contains(
                    "open"
                )
                    ? CONFIG.translations["filters"]
                    : CONFIG.translations["close_filters"];

                filtersPopupEl.classList.toggle("open");
                filtersPopupEl.style.setProperty(
                    "--ak-filter-bottom-offset",
                    filtersPopupEl.getBoundingClientRect().bottom + "px"
                );
            }
        });
    }

    filterWidgetEls.forEach((el) => {
        el.addEventListener("click", (e) => {
            const openedItem = document.querySelector(".ak-filter-widget.open");
            e.target.closest(".ak-filter-widget").classList.toggle("open");

            if (openedItem) {
                openedItem.classList.remove("open");
            }
        });
    });
}

function initArchiveProductsScripts() {
    initSortScripts();
    initFilterScripts();
    initGridViewToggle();
}

export { initArchiveProductsScripts };
