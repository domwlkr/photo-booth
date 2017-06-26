export function init() {
    initCanvas();
}

const options = {
    width: 1600,
    height: 900
};

var initCanvas = () => {
    let img = $('#source').get(0);
    let $canvasbg = $('<div class="canvas" />');
    let canvas = $('<canvas class="greenscreen" />').get(0);
    $canvasbg.append(canvas);
    $('body').append($canvasbg);

    greenScreen(img, canvas, $canvasbg);
};

var greenScreen = (img, canvas, $container, bg) => {
    console.log(img, canvas, $container);

    var context = canvas.getContext('2d');
    canvas.width = options.width;
    canvas.height = options.height;
    $container.width(options.width);
    $container.height(options.height);
    context.drawImage(img, 0, 0);

    var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
    var data = imageData.data;
    var start = {
        red: data[0],
        green: data[1],
        blue: data[2]
    };
    var tolerance = 150;

    for(var i = 0, n = data.length; i < n; i += 4) {
        var diff = Math.abs(data[i] - data[0]) + Math.abs(data[i+1] - data[1]) + Math.abs(data[i+2] - data[2]);
        data[i + 3] = (diff*diff)/tolerance;
    }

    context.putImageData(imageData, 0, 0);
};

