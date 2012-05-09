/* 
    Document   : main
    Created on : May 6, 2012, 4:08:24 PM
    Author     : Daniel González <daniel.gonzalez@freelancemadrid.es>
*/

//<![CDATA[

$(document).ready(function() {
    var $img = $('<img src="/bundles/frontend/images/flickr.png" class="flickr"/>');
    $('div#search-result img').lazyload({
        effect : 'fadeIn',
        event: 'scrollstop',
        callback: function (){
            $(this).addClass('bordered').after($img.clone());
            console.log($img);
        }
    });
    $("div#search-result a.fancybox").fancybox({
        'titlePosition'	:	'inside' 
    });
});
//]]>