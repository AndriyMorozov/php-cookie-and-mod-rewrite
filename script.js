function setCookie(name, value, options = {}) {

    options = {
        path: '/',
        // за потреби додайте інші типові значення
        ...options
    };

    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }

    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }

    document.cookie = updatedCookie;
}
function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
document.querySelector('.menu').addEventListener(
    'click', (event) => {
        let target = event.target;
        let divMenu = document.querySelector('.menu');
        for(let elem of divMenu.children) {
            elem.classList.remove('selected');
        }
        setCookie('color', target.className);
        target.classList.add('selected');
    }
);
let color = getCookie('color');
let elem = document.querySelector(`.${color}`);
if (elem !== null)
{
    elem.classList.add('selected');
}