let query=new URLSearchParams(location.search),
    url=location.href,
    currentPage = query.get('pg') ||
    (url.includes('carapp')
    ? 'table' : 'index');
function changePage() {
    document.querySelectorAll('.content').forEach((e) => {
        if (e.id === currentPage)
            e.style.display = 'block';
        else e.style.display = 'none';
    });
}
changePage();