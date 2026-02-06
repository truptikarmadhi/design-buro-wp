export class Header {
    init() {
        this.HeaderFixed();
    }

    HeaderFixed() {
        let prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
        let header = $(".header");

        let heroBottom = $(".hero-section").offset().top + $(".hero-section").outerHeight();

        $(window).on("scroll", function () {
            let scrollTop = $(window).scrollTop();

            /* ===== Hero-based fixed logic ===== */
            if (scrollTop >= heroBottom) {
                header
                    .addClass("header-fixed")
                    .removeClass("header-fixed-os");
            } else {
                header
                    .removeClass("header-fixed")
                    .addClass("header-fixed-os");
            }

            /* ===== Scroll top (0) state ===== */
            if (scrollTop === 0) {
                header.removeClass("header-fixed-os hidden");
            }

            /* ===== Hide / show on scroll direction ===== */
            let currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;

            if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
                header.removeClass("hidden");
            } else {
                header.addClass("hidden");
            }

            prevScrollPos = currentScrollPos;
        });
    }
}