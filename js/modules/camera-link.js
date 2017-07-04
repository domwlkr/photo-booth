let $link = $('#take-pic');
let $restart = $('.restart');
let $upload = $('#facebook');
let $loader = $('.loader');
let $viewer = $('.viewer');
let $uploaded = $('.message');

$link.on('click', function() {
    $link.addClass('hidden');
    $loader.addClass('loading');

    $.get('camera-images/take-photo.php', function(data) {
        $loader.removeClass('loading');
        $viewer.find('.viewer__image').html(data).parent().addClass('loaded');
    });
});

$restart.on('click', function() {
    restartExperience();           
});

$upload.on('click', function() {
    uploadImage();           
});

var restartExperience = function() {
    $viewer.removeClass('loaded');
    $uploaded.removeClass('success');
    $link.removeClass('hidden');
};

var uploadImage = function() {
    $loader.addClass('loading');
    $viewer.removeClass('loaded');

    $.get('upload.php', function(data) {
        console.log('shrug', data);
        $loader.removeClass('loading');
        $uploaded.addClass('success');
    });
};