// Imports.
import $ from 'jquery' // eslint-disable-line
import Swiper, { Pagination, Autoplay, Navigation } from 'swiper';

// Common
import { makeEmbedsResponsive } from './common/video-embeds'

const pixelsThemeApp = (function main() {
  const handleResponsiveVideos = () => {
    const videos = document.querySelectorAll('iframe[src*="youtube"], iframe[src*="vimeo"]')
    makeEmbedsResponsive(videos)
  }

  const handleHamburgerClick = () => {
    const hamburger = document.querySelector('.js-hamburger');

    if (hamburger) {
      hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active');

        const mobileNav = document.querySelector('.js-nav-mobile-container');

        if (mobileNav) {
          mobileNav.classList.toggle('show');
        }
      });
    }
  }

  const handleMobileDropdownToggleClick = () => {
    const toggles = document.querySelectorAll('.js-nav-mobile-dropdown-toggle');

    if (toggles) {
      toggles.forEach((toggle) => {
        toggle.addEventListener('click', () => {
          const dropdownMenuId = toggle.dataset.toggle;
          const dropdownMenu = document.getElementById(dropdownMenuId);

          if (dropdownMenu) {
            dropdownMenu.classList.toggle('show');
          }
        })
      })
    }
  }

  const addSliderModules = () => Swiper.use([Pagination, Autoplay, Navigation]);

  const initHeroSlider = () => new Swiper('.js-hero-slider', {
    direction: 'vertical',
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  const initReviewsSlider = () => new Swiper('.js-reviews-slider', {
    loop: true,
    speed: 500,
    slidesPerView: 1,
    spaceBetween: 100,
    autoplay: {
      delay: 3000,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },
    navigation: {
      nextEl: '.js-reviews-slider-prev',
      prevEl: '.js-reviews-slider-next',
    },
    breakpoints: {
      1024: {
        spaceBetween: 200,
        slidesPerView: 2,
      },
    },
  });

  const initLogosSlider = () => new Swiper('.js-logos-slider', {
    loop: true,
    speed: 500,
    slidesPerView: 2,
    spaceBetween: 100,
    height: 67,
    autoplay: {
      delay: 3000,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });

  const animateValue = (obj, start, end, duration) => {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      obj.innerHTML = Math.floor(progress * (end - start) + start); // eslint-disable-line
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
    };
    window.requestAnimationFrame(step);
  }

  const isElementInViewport = (element) => {
    const position = element.getBoundingClientRect();

    if (position.top >= 0 && position.bottom <= window.innerHeight) {
      return true;
    }

    return false;
  }

  const animateStatisticsNumbers = () => {
    const numbers = document.querySelectorAll('.js-statistics-number');

    if (numbers) {
      numbers.forEach((number) => {
        const finalNumber = number.dataset.number;

        animateValue(number, 0, finalNumber, 3000);
      })
    }
  }

  const handleStatisticsAnimation = () => {
    const statisticsSection = document.querySelector('.js-statistics-section');

    if (statisticsSection && isElementInViewport(statisticsSection)) {
      animateStatisticsNumbers();
    }
  }

  // Page load actions.
  const init = () => {
    handleResponsiveVideos();
    handleHamburgerClick();
    handleMobileDropdownToggleClick();
    addSliderModules();
    initHeroSlider();
    animateStatisticsNumbers();
    initReviewsSlider();
    initLogosSlider();
  }

  // Scroll actions.
  const scroll = () => {
    handleStatisticsAnimation();
  }

  // Resize screen actions.
  const resize = () => {

  }

  // Exports to DOM binds.
  return { init, scroll, resize }
}())

/**
 * DOM listener binds
 * --> Init
 * --> Scroll
 * --> Resize
 */
document.addEventListener('DOMContentLoaded', () => {
  pixelsThemeApp.init()
})

window.addEventListener('scroll', () => {
  pixelsThemeApp.scroll();
})

window.addEventListener('resize', () => {
  pixelsThemeApp.resize();
})
