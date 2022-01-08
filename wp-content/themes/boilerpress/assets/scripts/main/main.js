//******************************************************************************
//
//
//
//  #MAIN
//
//
//
//******************************************************************************

import Example from './components/Example';

window.onload = function () {
    // Prevent FOUC
    document.getElementsByTagName('html')[0].classList.remove('is-dom-loading');

    // Prevent animations and transitions on window resize
    let timerWindowResize;

    window.addEventListener('resize', function () {
        document
            .getElementsByTagName('html')[0]
            .classList.add('is-disable-animations');

        clearTimeout(timerWindowResize);

        timerWindowResize = setTimeout(function () {
            document
                .getElementsByTagName('html')[0]
                .classList.remove('is-disable-animations');
        }, 400);
    });

    new Example('.c-example');
};
