/**
 * To show off JS works and can be integrated.
 */
(function () {
    "use strict";

    /*eslint-disable */
    var carousels = bulmaCarousel.attach();
    /*eslint-enable */

    console.info("main.js ready and loaded.");

    var pagination = document.getElementsByClassName("pagination-link");
    var redovisningar = document.getElementsByClassName("redovisning");
    var currentRedovisning = 0;

    var makeActive = (active, old) => {
        if (0 !== parseInt(old)) {
            redovisningar[parseInt(old) - 1].classList.add("hide");
            pagination[parseInt(old) - 1].classList.remove("is-current");
        } else {
            redovisningar[parseInt(old)].classList.add("hide");
            pagination[parseInt(old)].classList.remove("is-current");
        }

        redovisningar[parseInt(active) - 1].classList.remove("hide");
        pagination[parseInt(active) - 1].classList.add("is-current");
    };

    for (let button of pagination) {
        button.addEventListener("click", () => {
            makeActive(button.innerHTML, currentRedovisning);
            currentRedovisning = button.innerHTML;
        });
    }
})();
