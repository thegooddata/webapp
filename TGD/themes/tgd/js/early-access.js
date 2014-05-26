// save original content
var content = $('#earlyAccessModal .modal-dialog').html();

// once the modal is visible and the content is loaded, deal with
// the form submission
$('#earlyAccessModal').on('shown.bs.modal', function(e) {
    $(this).find('form').submit(function(e) {
        // prevent form submission
        e.preventDefault();
        var $modalBody = $(".modal-body");
        var modalBodyHeight = $modalBody.height();
        var $modalFooter = $(".modal-footer");
        var modalFooterHeight = $modalFooter.height();
        // disable butons
        $('.modal-footer .btn').attr('disabled', 'disabled');
        // loading class
        $('.modal-footer').toggleClass('loading');
        // collect data from the form's input fields
        var $form = $(this),
                url = $form.attr('action'),
                id = $form.find("input[name=id]").val(),
                MERGE0 = $form.find("input[name=MERGE0]").val(),
                spam = $form.find("input[name=b_c536df10462fb6afe72117895_b5320da781]").val();
        // build data object that holds the data that will be sent
        // along with the POST request
        var data = {
            id: id,
            MERGE0: MERGE0,
            b_c536df10462fb6afe72117895_b5320da781: spam
        };
        // send AJAX request
        var posting = $.post(
                url, // taget URL
                data, // request data
                function(data, status) { // success callback
                    $('.modal-header h2').html('Success!');
                    $('.modal-body').empty().append(data).height(modalBodyHeight).css('text-align', 'center');
                    $('.modal-footer').empty().append('<button data-dismiss="modal" class="btn btn-primary" type="button">« return to our website</button>').height(modalFooterHeight).toggleClass('loading').find('.btn').css('width', 'auto');
                },
                'html' // data type expected from the server
                ).error(function() {
            $('.modal-header h2').html('Error');
            $('.modal-body').empty().append('Something went wrong while processing your request').css('text-align', 'center');
            $('.modal-footer').empty().append('<button data-dismiss="modal" class="btn btn-primary" type="button">« return to our website</button>').toggleClass('loading').find('.btn').css('width', 'auto');
        });
    });
});
// This handler restores the modal to a clean state everytime the
// user closes it. Without it, the modal would reflect the same
// state it had before being closed the last time.
$('#earlyAccessModal').on('hidden.bs.modal', function(e) {
    // delete model content
    $('.modal-content').remove();
    // restore original content
    $('.modal-dialog').html(content);
});