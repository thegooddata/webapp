$(function(){
    var $modal = $('<div id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>').addClass('modal fade'),
    $modalDialog = $('<div></div>').addClass('modal-dialog'),
    $modalContent = $('<div></div>').addClass('modal-content'),
    $modalHeader = $('<div></div>')
            .addClass('modal-header')
            .append('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>')
            .append('<h4 class="modal-title">Modal title</h4>'),
    $modalBody = $('<div></div>').addClass('modal-body'),
    $modalFooter = $('<div></div>')
            .addClass('modal-footer')
            .append('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>')
            .append('<button type="button" class="btn btn-primary">Send</button>');
    $modalContent.append($modalHeader, $modalBody, $modalFooter);
    $modalDialog.append($modalContent);
    $modal.append($modalDialog);
    
    $('body').append($modal);
    
    $('#sign-in a').click(function(e){
        e.preventDefault();
        var options = {
            keyboard : true,
            remote : '/site/signin'
        };
       $modal.modal(options); 
    });
});


