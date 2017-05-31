let $link = $('#take-pic');
let $loader = $('.loader');
let $viewer = $('.viewer');

$link.on('click', function() {
    console.log('click');

    $link.addClass('hidden');
    $loader.addClass('loading');

    $.get('camera-images/take-photo.php', function(data) {
        $loader.removeClass('loading');
        $viewer.html(data).addClass('loaded');     
    });
});
