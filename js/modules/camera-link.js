let $link = $('#take-pic');

$link.on('click', function() {
    $.get('take-photo.php', function(data) {
        console.log(data);
    });
});
