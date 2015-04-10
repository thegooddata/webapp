var jcrop_api;
var default_width = 312;

$(document).ready(function(){

    $(window).load(function() {
        jcrop_api = $.Jcrop('#profile_crop', {
            aspectRatio: 1
        });
    });

    $('#User_image').change(function () {
        $('#form .alert').remove();
        if(this.value.match(/\.(jpg|jpeg|png|gif)$/)) {
            upload_file(this);
        }else{
            $('#form').prepend('<div class="alert alert-danger"><ul><li>This should be an image</li></ul></div>');
        }
    });

    $(document).on('click', '.profile_crop_avatar', function(){
        $('#profile_crop_image').hide();
        $('#profile_crop').hide();
        $('.profile_preview_block').show();
    });

});

function showPreview(coords)
{
    var rx = 150 / coords.w;
    var ry = 150 / coords.h;

    var img = $('#profile_crop')[0];

    var gw = img.width / default_width;

    $('#profile_image_preview').css({
        width: Math.round(rx * default_width) + 'px',
        height: Math.round(ry * img.height * default_width / img.width) + 'px',
        marginLeft: '-' + Math.round(rx * coords.x) + 'px',
        marginTop: '-' + Math.round(ry * coords.y) + 'px'
    });

    set_сords(Math.round(coords.x * gw), Math.round(coords.y * gw), Math.round(coords.w * gw), Math.round(coords.h * gw));

    $('.profile_crop_avatar').show();
}

function upload_file(input) {
    var fd = new FormData();
    fd.append("User[image]", input.files[0]);
    if($('#admin_user_id').length > 0){
        fd.append("user_id", $('#admin_user_id').val());
    }

    $.ajax({
        url: '/user/profile/upload',
        type: 'POST',
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data) {
                show_crop(data);
                var gh = data.w;
                if(data.w > data.h) gh = data.h;
                set_сords(0, 0, gh, gh);
            }
        }
    });
}

function show_crop(data){
    $('#profile_image').hide();
    $('.profile_preview_block').hide();
    $('#profile_crop_image').show();
    $('.profile_crop_avatar').show();
    $('#profile_crop').show();

    $('#profile_crop').attr('src', data.src);
    $('#profile_image_preview').attr('src', data.src);

    var image_height = Math.round(data.h * default_width / data.w);
    var image_width = Math.round(data.w * default_width / data.w);

    $('#profile_crop').css('width', image_width + 'px');
    $('#profile_crop').css('height', image_height + 'px');

    jcrop_api.destroy();
    $('.jcrop-holder').remove();

    jcrop_api = $.Jcrop('#profile_crop', {
        onChange: showPreview,
        onSelect: showPreview,
        setSelect: [0, 0, default_width, image_height],
        aspectRatio: 1
    });

    $('.jcrop-holder').addClass('thumbnail');
}

function set_сords(x,y,w,h){
    $('#x').val(x);
    $('#y').val(y);
    $('#w').val(w);
    $('#h').val(h);
}
