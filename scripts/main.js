if (location.href.includes('web250/?')) {
    document.title = document.title.split(' - ').map((e,i) => {
        if (i !== 2) return e;
        let pg = new URLSearchParams(location.search).get('pg');
        switch (pg) {
            case 'index':
                return 'Home';
            case 'introduction':
                return 'Intro';
            case 'contract':
                return 'Course contract';
            case 'intro_form':
                return 'Intro form';
            case 'fizzbuzz_form':
            case 'fizzbuzz_bang':
                return 'FizzBuzz bang';
            default:
                break;
        }
    }).join(' - ');
}
let externalLinks = document.getElementById('hover');
let menu = document.getElementById('externalLinks');
externalLinks.addEventListener('mouseenter',(e) => {
    menu.classList.add('show');
});
externalLinks.addEventListener('mouseleave',(e) => {
    menu.classList.remove('show');
});