function getCookie() {
    if (!document.cookie) return {};
    let items = document.cookie.split('; ');
    let data = {};
    items.forEach((e) => {
        let [key, val] = e.split('=');
        data[key] = decodeURIComponent(val);
    });
    return data;
};
let cookie = getCookie();
if (!location.href.includes('pg=')) {
    if (cookie.loggedIn === 'true') {
        location.href = '?pg=loggedIn';
    } else location.href = '?pg=login';
}