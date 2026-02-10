import "slick-carousel";
import Swiper from "swiper";

export class Plugins {
  init() {
    this.HeroSlider();
    this.OpenProjectSlider();
    this.RelatedOpenProjectSlider();
    this.TeamSlider();
  }
  // HeroSlider() {
  //   $(".hero-slider").slick({
  //     dots: true,
  //     infinite: true,
  //     slidesToShow: 1,
  //     slidesToScroll: 1,
  //     autoplay: true,
  //     speed: 2000,
  //     draggable: true,
  //     arrows: false,
  //     fade: true,
  //     responsive: [
  //       {
  //         breakpoint: 991,
  //         settings: {
  //           slidesToShow: 1,
  //         },
  //       },
  //       {
  //         breakpoint: 525,
  //         settings: {
  //           slidesToShow: 1,
  //           infinite: false,
  //         },
  //       },
  //     ],
  //   });
  // }

  HeroSlider() {
  var $slider = $(".hero-slider");

  $slider.on("init", function (event, slick) {
    handleVideo(slick.currentSlide, slick);
  });

  $slider.slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    speed: 500,
    draggable: true,
    arrows: false,
    fade: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 525,
        settings: {
          slidesToShow: 1,
          infinite: false,
        },
      },
    ],
  });

  // NEW CODE START
  function handleVideo(currentSlide, slick) {
    var $currentSlide = $(slick.$slides[currentSlide]);
    var video = $currentSlide.find("video").get(0);

    // reset all videos
    $slider.find("video").each(function () {
      this.pause();
      this.currentTime = 0;
      this.onended = null;
    });

    if (video) {
      // pause slick autoplay during video
      $slider.slick("slickPause");

      video.play();

      // video complete hone par next slide
      video.onended = function () {
        $slider.slick("slickNext");
        $slider.slick("slickPlay");
      };
    }
  }

  // jab slide change ho
  $slider.on("afterChange", function (event, slick, currentSlide) {
    handleVideo(currentSlide, slick);
  });
  // NEW CODE END
}


  OpenProjectSlider() {
    $(".project-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      infinite: true,
      prevArrow: ".project-image-slider-section .prev-arrow",
      nextArrow: ".project-image-slider-section .next-arrow",
      centerMode: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }




  RelatedOpenProjectSlider() {
    $(".related-project-slider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      dots: false,
      variableWidth: true,
      centerMode: false,
      prevArrow: ".related-project-slider-section .prev-arrow",
      nextArrow: ".related-project-slider-section .next-arrow",
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  TeamSlider() {
    $(".team-slider").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: false,
      arrows: true,
      dots: false,
      prevArrow: ".team-slider-section .prev-arrow",
      nextArrow: ".team-slider-section .next-arrow",
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }
}
