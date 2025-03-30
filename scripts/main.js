//debugger
let query=new URLSearchParams(location.search),
    url=location.href,
    currentPage = query.get('pg') ||
    (url.includes('carapp/')
    ? 'view' : 'index')
function changePage() {
    document.querySelectorAll('.content').forEach(e=>{
        if (e.id == currentPage)
            e.style.display = 'block'
        else e.style.display = 'none'
    })
}
changePage()
/* document.querySelectorAll('.content-link').forEach(a=>a.onclick=e=>{
    e.preventDefault()
    let link = new URL(a.href)
    let q=new URLSearchParams(link.search)
    currentPage = q.get('pg')
    changePage()
}) */