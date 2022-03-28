function initCareGuidePageScripts() {
    const careGuideItemsEls = document.querySelectorAll(".care-guide-item");

    careGuideItemsEls.forEach((el) => {
        el.addEventListener("click", (e) => {
            e.preventDefault();

            e.target.closest(".care-guide-item").classList.toggle("open");
        });
    });
}

export { initCareGuidePageScripts };
