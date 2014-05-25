$(function() {
    var sameSize = function() {
        var rowHeight = $('#tgd-page-content .row > div:first-child').innerHeight();
        $('#descriptions').innerHeight(rowHeight);
        $('#form').innerHeight(rowHeight);
    };

    setTimeout(function(){sameSize();},100);
});

$(document).ready(function(){
  $('#descriptions .btn').click( function( e ){
    var dataToggle = $(this).data('toggle');
    console.log(dataToggle);
    $('#descriptions').addClass( dataToggle );
  });

});