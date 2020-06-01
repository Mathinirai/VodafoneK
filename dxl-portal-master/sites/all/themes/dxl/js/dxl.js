/**
 * @fileOverview Custom JS.
 *
 */
(function($) { 
    Drupal.behaviors.custom_js = {
        attach: function(context, settings) {
            $("#edit-field-contact-information-und-add-more-add-more").mousedown();
            $('[id^="edit-field-circular-content-und-add-more"]').mousedown();
            $('[id^="edit-field-svg-content-und-add-more"]').mousedown();
            $('#edit-field-tabs-content-und-add-more-add-more').mousedown();
            $('#edit-field-tabs-content-und-0-field-card-content-und-add-more-add-more').mousedown();
            // Inline market
            $('#edit-field-markets-und').addClass('container-inline');
            $('#edit-field-markets-und .form-item label.option').css('margin-right','20px');
        }
    };

})(jQuery);