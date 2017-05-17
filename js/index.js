/**
 * This file is teh main entry point for all clientside javascript.
 *
 * If you need page/widget. or component specific scripts, create a new file (see the example page-about.js file)
 * in the src directory and import it below. THis file will serve as a map for what modules have been imported
 * into the project.
 */

// Global namespace
const Lucia = Lucia || {};

import * as cameraLink from './modules/camera-link.js';

Lucia.init = () => {
    let router = {
        all: [
            // modules to run on all pages
        ],
        index: [
            // modules to run on "index"
        ]
    };

    // Set current page
    let currentPage = document.body.getAttribute('data-page');

    // Assign modules for all route
    let modules = router.all;

    // If there are modules for current route - concat to modules
    if (router[currentPage]) {
        modules = modules.concat(router[currentPage]);
    }

    // Loops through modules and calls init
    for (var i = modules.length - 1; i >= 0; i--) {
        modules[i].init.call();
    }
};

document.addEventListener('DOMContentLoaded', () => {
    Lucia.init();
});