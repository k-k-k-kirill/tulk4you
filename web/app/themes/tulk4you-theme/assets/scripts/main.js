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

  const setBackgroundCircleDimensions = () => {
    const circle = document.querySelector('.js-form-background-circle');

    if (circle) {
      const mainElement = document.querySelector('main');
      const siteFooter = document.querySelector('.site-footer');

      if (mainElement && siteFooter) {
        const size = mainElement.clientHeight + siteFooter.clientHeight;

        circle.style.height = `${size}px`;
        circle.style.width = `${size}px`;
      }
    }
  }

  const initContactPageMap = () => {
    const mapContainer = document.querySelector('.js-contact-page-map');

    if (mapContainer) {
      const { lat, lng } = mapContainer.dataset;
      const location = { lat: parseFloat(lat), lng: parseFloat(lng) };

      const map = new google.maps.Map( //eslint-disable-line
        mapContainer,
        {
          zoom: 15,
          center: location,
          styles: [
            {
              elementType: 'geometry',
              stylers: [
                {
                  color: '#f5f5f5',
                },
              ],
            },
            {
              elementType: 'labels.icon',
              stylers: [
                {
                  visibility: 'off',
                },
              ],
            },
            {
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#616161',
                },
              ],
            },
            {
              elementType: 'labels.text.stroke',
              stylers: [
                {
                  color: '#f5f5f5',
                },
              ],
            },
            {
              featureType: 'administrative.land_parcel',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#bdbdbd',
                },
              ],
            },
            {
              featureType: 'poi',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#eeeeee',
                },
              ],
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#757575',
                },
              ],
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#e5e5e5',
                },
              ],
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#9e9e9e',
                },
              ],
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#ffffff',
                },
              ],
            },
            {
              featureType: 'road.arterial',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#757575',
                },
              ],
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#dadada',
                },
              ],
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#616161',
                },
              ],
            },
            {
              featureType: 'road.local',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#9e9e9e',
                },
              ],
            },
            {
              featureType: 'transit.line',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#e5e5e5',
                },
              ],
            },
            {
              featureType: 'transit.station',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#eeeeee',
                },
              ],
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [
                {
                  color: '#c9c9c9',
                },
              ],
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [
                {
                  color: '#9e9e9e',
                },
              ],
            },
          ],
        },
      );

      const marker = new google.maps.Marker({ //eslint-disable-line
        position: location,
        map,
        icon: '/app/themes/tulk4you-theme/dist/images/marker.svg',
      });

      return map;
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
    setBackgroundCircleDimensions();
    initContactPageMap();
  }

  // Scroll actions.
  const scroll = () => {
    handleStatisticsAnimation();
  }

  // Resize screen actions.
  const resize = () => {
    setBackgroundCircleDimensions();
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
