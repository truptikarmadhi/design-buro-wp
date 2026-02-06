export class Header {
  init() {
    this.HeaderFixed();
    this.ResHeader();
  }

  HeaderFixed() {
    var prevScrollPos =
      window.pageYOffset || document.documentElement.scrollTop;
    $(window).scroll(function () {
      var sticky = $(".header"),
        scroll = $(window).scrollTop();
      if (scroll >= 50) {
        sticky.addClass("header-fixed");
        sticky.removeClass("header-fixed-os");
      } else {
        sticky.removeClass("header-fixed");
        sticky.addClass("header-fixed-os");
      }
      var currentScrollPos =
        window.pageYOffset || document.documentElement.scrollTop;
      if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
        $(".header").removeClass("hidden");
      } else {
        $(".header").addClass("hidden");
      }
      prevScrollPos = currentScrollPos;
    });
  }

  ResHeader() {
    jQuery(document).ready(function ($) {
      function handleMenu() {
        if ($(window).width() < 992) {
          $(".navigation").removeClass("d-flex").addClass("d-none");
          $(".menu-icons")
            .off("click")
            .on("click", function () {
              if ($(this).hasClass("active")) {
                $(this).removeClass("active");

                $(this)
                  .find(".menu-icon")
                  .removeClass("d-none")
                  .addClass("d-flex");

                $(this)
                  .find(".close-icon")
                  .removeClass("d-flex")
                  .addClass("d-none");

                $(".header").removeClass("header-active");
                $("body").removeClass("overflow-hidden");
                $(".navigation").removeClass("d-flex").addClass("d-none");
              } else {
                $(this).addClass("active");

                $(this)
                  .find(".menu-icon")
                  .removeClass("d-flex")
                  .addClass("d-none");

                $(this)
                  .find(".close-icon")
                  .removeClass("d-none")
                  .addClass("d-flex");

                $(".header").addClass("header-active");
                $("body").addClass("overflow-hidden");
                $(".navigation").removeClass("d-none").addClass("d-flex");
              }
            });
        }
      }

      handleMenu();

      $(window).on("resize", function () {
        handleMenu();
      });
    });
  }
}
