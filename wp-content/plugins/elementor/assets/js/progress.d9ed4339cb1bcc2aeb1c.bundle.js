/*! elementor - v3.7.1 - 14-08-2022 */
"use strict";
(self["webpackChunkelementor"] = self["webpackChunkelementor"] || []).push([["progress"],{

/***/ "../assets/dev/js/frontend/handlers/progress.js":
/*!******************************************************!*\
  !*** ../assets/dev/js/frontend/handlers/progress.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

class Progress extends elementorModules.frontend.handlers.Base {
  getDefaultSettings() {
    return {
      selectors: {
        progressNumber: '.elementor-progress-bar'
      }
    };
  }

  getDefaultElements() {
    const selectors = this.getSettings('selectors');
    return {
      $progressNumber: this.$element.find(selectors.progressNumber)
    };
  }

  onInit() {
    super.onInit();
    elementorFrontend.waypoint(this.elements.$progressNumber, () => {
      const $progressbar = this.elements.$progressNumber;
      $progressbar.css('width', $progressbar.data('max') + '%');
    });
  }

}

exports["default"] = Progress;

/***/ })

}]);
//# sourceMappingURL=progress.d9ed4339cb1bcc2aeb1c.bundle.js.map