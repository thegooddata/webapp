$(function() {
    var sameSize = function() {
        var rowHeight = $('#tgd-page-content .row > div:first-child').innerHeight();
        $('#descriptions').innerHeight(rowHeight);
        $('#form').innerHeight(rowHeight);
    };

    setTimeout(function(){sameSize();},100);
});

$(document).ready(function(){

  $('#descriptions button').not(':disabled').click(function() {

      var targetId     = '#' + $(this).data('toggle'),    
           $target     = $(targetId),
           $parent     = $target.parent();
           $dataToggle = $(this).data('toggle');

      if (!$target.is(':visible')) {
          // hide the rest
          $parent.children().not(targetId).hide();
          // show the target
          $target.show();

          $('#descriptions').removeClass()
                            .addClass( $dataToggle );
          $('div.section').removeClass("selected");
          $(this).closest('div.section').addClass("selected");
      }

  });

});