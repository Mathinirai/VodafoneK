/**
 * @file
 *  Webform file managed field behaviours.
 */
var Webform_hide_upload = Webform_hide_upload || {};

(function ($) {

  'use strict';

  Drupal.behaviors.webform_managed_file = {
    attach: function (context) {
      Webform_hide_upload.webform_managed_file.initialize(context);
    }
  };

  Webform_hide_upload.webform_managed_file = {

    HIDDEN_CLASS: 'webform-hide-upload-force',

    initialize: function () {
      this.bindEvents();
    },

    bindEvents: function () {
      this.getManagedFileFieldElementWrapper().bind('change', $.proxy(function (e) {
        if ($(e.currentTarget).val()) {
          $(e.currentTarget).next('input.form-submit').removeClass(this.HIDDEN_CLASS);
        }
      }, this));
    },

    getManagedFileFieldElementWrapper: function () {
      return $('.webform-client-form input.form-file');
    }

  };

})(jQuery);
