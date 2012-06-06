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
    if (!$.cookie('alert')){
        var $alert = $('<div class="alert alert-block">' +
            '<a class="close" id="alert-close" data-dismiss="alert" href="#">×</a>' +
            '<h4 class="alert-heading">Warning!</h4>This is a beta version.' +
            '</div>');
        $('section#main').prepend($alert);
        $('a#alert-close').click(function(){
            $alert.remove('slow');
            $.cookie('alert', true, {
                expires: 30
            });
        });
    }
});