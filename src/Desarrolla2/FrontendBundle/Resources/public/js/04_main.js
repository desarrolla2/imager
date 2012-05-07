/* 
    Document   : main
    Created on : May 6, 2012, 4:08:24 PM
    Author     : Daniel González <daniel.gonzalez@freelancemadrid.es>
*/

//<![CDATA[

$(document).ready(function() {
    $('div#search-result img').lazyload({
        event: "scrollstop"
    });
    
    $("div#search-result a.fancybox").fancybox({
        'titlePosition'	: 'over'
    });
});

//]]>