let $link = $('#take-pic');

$link.on('click', function() {
    $.get('camera-images/take-photo.php', function(data) {
        console.log(data);
    });
});
