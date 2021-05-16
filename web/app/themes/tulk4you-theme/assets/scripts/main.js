// Common
import { makeEmbedsResponsive } from './common/video-embeds'

// Imports.
import $ from 'jquery' // eslint-disable-line

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

  // Page load actions.
  const init = () => {
    handleResponsiveVideos();
    handleHamburgerClick();
    handleMobileDropdownToggleClick();
  }

  // Scroll actions.
  const scroll = () => {

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
