const BASE_URL = 'http://localhost/';

function loadHeader() {
    $(".header").load('Navigation/header.html');
}

function getUrlParameter(key) {
    var url = new URL(window.location);

    return url.searchParams.get(key);
}