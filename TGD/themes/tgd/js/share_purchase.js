$(function() {
    var sameSize = function() {
        var rowHeight = $('#tgd-page-content .row > div:first-child').innerHeight();
        $('#descriptions').innerHeight(rowHeight);
        $('#form').innerHeight(rowHeight);
    };

    setTimeout(function(){sameSize();},100);
});