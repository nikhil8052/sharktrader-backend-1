import _ from 'lodash';
window._ = _;

import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

function scrollFunction() {
    var scrollPos = 0;
    var scrollMax = document.documentElement.scrollHeight - window.innerHeight;

    window.addEventListener('scroll', function() {
        scrollPos = window.scrollY;

        if (scrollPos > scrollMax) {
            scrollPos = scrollMax;
        }

        var progressBarWidth = (scrollPos / scrollMax) * 100;
        var progressBarMinWidth = 10;
        var progressBarDynamicWidth = progressBarMinWidth + ((100 - progressBarMinWidth) * progressBarWidth / 100);
        if(document.getElementById("scroll-bar") != null){
            document.getElementById("scroll-bar").style.width = progressBarDynamicWidth + "%";
        }
    });
}

document.addEventListener('click', scrollFunction);
document.addEventListener('DOMContentLoaded', scrollFunction);




