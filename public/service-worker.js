self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open('lara-poll-cache').then((cache) => {
            return cache.addAll([
                '/',
                '/assets/css/nucleo-icons.css',
                '/assets/css/nucleo-svg.css',
                '/assets/css/nucleo-svg.css',
                '/assets/css/corporate-ui-dashboard.css?v=1.0.0',

                '/assets/js/core/popper.min.js',
                '/assets/js/core/bootstrap.min.js',
                '/assets/js/plugins/perfect-scrollbar.min.js',
                '/assets/js/plugins/smooth-scrollbar.min.js',
                '/assets/js/plugins/chartjs.min.js',
                '/assets/js/plugins/swiper-bundle.min.js',
                '/assets/js/corporate-ui-dashboard.min.js?v=1.0.0',
                // Add other assets you want to cache
            ]);
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});