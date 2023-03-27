var filesToCache = [
    "/",
    "./login",
    "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js",
    "https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap",
    "./app-assets/css-rtl/bootstrap.css",
    "./app-assets/css-rtl/bootstrap-extended.css",
    "./app-assets/css-rtl/colors.css",
    "./app-assets/css-rtl/components.css",
    "./app-assets/css-rtl/custom-rtl.css",
    "./app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css",
    "./app-assets/css-rtl/core/colors/palette-gradient.css",
    "./app-assets/css-rtl/pages/login-register.css",
    "./assets/css/style-rtl.css",
    "./app-assets/js/core/app-menu.js",
    "./app-assets/js/core/app.js",
    "./app-assets/js/scripts/forms/form-login-register.js",
];

self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache =>{
            return cache.addAll(filesToCache);
        })
    );
});

/* Serve cached content when offline */
self.addEventListener('fetch', function(e) {
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});