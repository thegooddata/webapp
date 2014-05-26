$(function() {
    var sameSize = function() {
        var kivaGrayHeight = $('#kiva .tgd-box-section:nth-child(3)').innerHeight(),
                picturesHeight = $('#kiva .tgd-box-section:nth-child(4)').innerHeight(),
                emphasisHeight = $('#chango .tgd-box-section:nth-child(4)').innerHeight(),
                deltaHeight = 0;
        // set heights of 2nd row
        $('#chango .tgd-box-section:nth-child(3)').innerHeight(kivaGrayHeight);
        // set heights of 3rd row
        deltaHeight = picturesHeight - emphasisHeight;
        deltaPadding = Math.ceil(deltaHeight / 2);
        $('#chango .tgd-box-section:nth-child(4)').css({'paddingTop':'+='+deltaPadding,'paddingBottom':'+='+deltaPadding}).innerHeight(picturesHeight-1);
    };

    
    setTimeout(function(){sameSize();},100);
    $('.logo').click(function(){
        var url = $(this).data('url');
        window.open(url, '_blank');
    });

    // add click handler for kiva stories
    $('.cases > div').click(function(){
        var url = $(this).find('a').attr('href');
        window.open(url, '_blank');
    }).find('a').click(function(e){
        e.preventDefault();
    });

});