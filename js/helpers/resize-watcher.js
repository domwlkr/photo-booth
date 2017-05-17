import EventEmitter from 'event-emitter-es6';

export function init() {
    resizeWatcher();
    handleResize();
}

class ResizeEmitter extends EventEmitter {
    constructor() {
        super();
    }
  
    fire(event, data) {
        this.emit(event, data);
    }
}

export let resizeEmitter = new ResizeEmitter();
let horizontal = false;

var resizeWatcher = () => {
    window.addEventListener('resize', handleResize);
};

var handleResize = () => {
    let width = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;

    resizing(width);

    if (width < 768 && horizontal === true) {
        horizontal = false;

        resizeEmitter.fire('change', {horizontal: horizontal});
        return true;
    }
    else if (width >= 768 && horizontal === false) {
        horizontal = true;
        resizeEmitter.fire('change', {horizontal: horizontal});

        return true;
    }
    return false;
};

var resizing = (width) => {
    resizeEmitter.fire('resizing', width);
};  