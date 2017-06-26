import * as canvas from './canvas.js';

let $link = $('#take-pic');
let $continue = $('.continue');
let $loader = $('.loader');
let $viewer = $('.viewer');

$link.on('click', function() {
    $link.addClass('hidden');
    $loader.addClass('loading');

    $.get('camera-images/take-photo.php', function(data) {
        $loader.removeClass('loading');
        $viewer.find('.viewer__image').html(data).parent().addClass('loaded');
    });
});

$continue.on('click', function() {
    console.log('caanvaas');
    canvas.init();
    $viewer.removeClass('loaded');
    $('.canvas').addClass('loaded');
});