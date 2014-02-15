$(function() {
    var sameSize = function() {
        var formHeight = $('#form').innerHeight();
        $('#contract').innerHeight(formHeight);
    };

    setTimeout(function(){sameSize();},100);


});
