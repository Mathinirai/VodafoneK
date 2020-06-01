/**
 * @fileOverview Theme JS.
 *
 */
(function($, Drupal) { 
    Drupal.behaviors.theme_js = {
        attach: function(context, settings) {
            // Change Logo Name 
            $('#icon-vodafone-logo title').html('Vodafone Logo');
            
            $('#api-table-list li').each(function(i) {
               var api_name = $(this).attr('id');
               api_name = api_name.replace("api-table", "api-tab");
               $( "."+api_name ).show();
            });
            $('#ms-table-list li').each(function(i) {
               var ms_name = $(this).attr('id');
               ms_name = ms_name.replace("ms-table", "ms-tab");
               $( "."+ms_name ).show();
            });
            // Start search here for all listing pages
            $('#search-name').keyup(function(){
                // Search Text
                var search = $(this).val();
                // Hide all table tbody rows
                $('#product-listing-table tr').hide();
                // Count total search result
                var len = $('#product-listing-table tr:not(.notfound) td:contains("'+search+'")').length;
                if(len > 0){
                  // Searching text in columns and show match row
                  $('#product-listing-table tr:not(.notfound) td:contains("'+search+'")').each(function(){
                    $(this).closest('tr').show();
                    $('.no-result-text').addClass('element-hidden');
                  });
                }else{
                  $('.no-result-text').removeClass('element-hidden');
                }
            });
              
            // Case-insensitive searching (Note - remove the below script for Case sensitive search )
            $.expr[":"].contains = $.expr.createPseudo(function(arg) {
                 return function( elem ) {
                   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                 };
            });
                      
            // Market dashboard filter JS start here
            $("#clear_filter").click(function(){
                $('#filter-count').text(0);
                $('#market-dashboard-market').val('All Markets');
                $('#market-dashboard-apis').val('All APIs');
                SearchData('All Markets', 'All APIs');
            });
            $("#market-dashboard-apis,#market-dashboard-market").on("change", function () {
                var market = $('#market-dashboard-market').find("option:selected").val();
                var api = $('#market-dashboard-apis').find("option:selected").val();
                var filter_value = parseInt($('#filter-count').text());
                if(filter_value != 2 )$('#filter-count').text(filter_value + 1);
                
                SearchData(market, api);
                var rowCount = $('#market-dashboard-table tbody tr:visible').length;
                if(rowCount == 0){
                    $('.no-result-text-inner.align--center').show();
                }else{
                    $('.no-result-text-inner.align--center').hide();
                }
            });
        }
    };

})(jQuery, Drupal);

/**
 * @copy url to clipboard.
 *
 */
function copyUrl(){
    var dummy = document.createElement('input'),
    text = window.location.href;
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');   
    document.body.removeChild(dummy);
    $('.copy-url .tooltiptext').html("It's been copied");
}


function SearchData(country, age) {
        if (country == 'All Markets' && age == 'All APIs') {
            $('#market-dashboard-table tbody tr').show();
        } else {
            $('#market-dashboard-table tbody tr:has(td)').each(function () {
                var rowCountry = $.trim($(this).find('td:eq(0)').text());
                var rowAge = $.trim($(this).find('td:eq(1)').text());

                if (country != 'All Markets' && age != 'All APIs') {
                    if (rowCountry == country && rowAge == age) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                } else if ($(this).find('td:eq(0)').text() != '' || $(this).find('td:eq(1)').text() != '') {
                    if (country != 'All Markets') {
                        if (rowCountry == country) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                    if (age != 'All APIs') {
                        if (rowAge == age) {
                            $(this).show();
                        }
                        else {
                            $(this).hide();
                        }
                    }
                }
 
            });
        }
    }