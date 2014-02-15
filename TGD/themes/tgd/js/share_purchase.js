$(function() {
    var sameSize = function() {
        var rowHeight = $('#page-content .row').innerHeight();
        $('#description').innerHeight(rowHeight);
        $('#form').innerHeight(rowHeight);
    };

    setTimeout(function(){sameSize();},100);
});