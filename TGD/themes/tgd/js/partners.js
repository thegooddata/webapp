$(function() {
    var sameSize = function() {
        var kivaGrayHeight = $('#kiva .very-light-gray').innerHeight(),
                picturesHeight = $('#kiva .clearfix').innerHeight();
        $('#chango .very-light-gray').innerHeight(kivaGrayHeight);
        $('#chango .very-light-blue').innerHeight(picturesHeight);
    };

    setTimeout(function(){sameSize();},100);


});