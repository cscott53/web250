//debugger
let query=new URLSearchParams(location.search),
    url=location.href,
    currentPage = query.get('pg') ||
    (url.includes('carapp2')
    ? 'table' : (url.includes('carapp/')
    ? 'view' : 'index'))
function changePage() {
    document.querySelectorAll('.content').forEach(e=>{
        if (e.id == currentPage)
            e.style.display = 'block'
        else e.style.display = 'none'
    })
}
changePage()