/**
 * @file
 * Code for humbergur menu.
 */

(function($) {
  Drupal.behaviors.userActivity = {
      attach: function(context, settings) {
          // js for total comments and total nodes tabs
          $(".tab-user-content").each(function(i) {
            $(this).attr('id', "tab-user-"+(i+1));
          });
          $(".tabs-user-activity a").each(function(i) {
            $(this).attr('data-tab', "tab-user-"+(i+1));
          });
          $('.tabs-user-activity a').click(function(){
            var tab_id = $(this).attr('data-tab');
            $('.tabs-user-activity  a').removeClass('active');
            $('.tabs-user-activity  li').removeClass('active');
            $('.tab-user-content').removeClass('active').hide();
            $(this).addClass('active');
            $(this).parent().addClass('active');
            $("#"+tab_id).addClass('active').show();
        });
      }
    };
})(jQuery);
