$(document).ready(function() {
    $('body').append('<div class="modal" id="modal-window" style="display: none;"></div>');
    $('.not-available').click(function(){
        $('#modal-window').html('<div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>This feature is not available yet! :(</h3></div>' +
            '<div class="modal-body"><p>Sorry we are working to make it available as soon as possible</p></div>'); 
        $('#modal-window').modal();
        return false;
    });
});