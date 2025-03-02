let currentPage,url=location.href
if (url.includes('#'))
    currentPage = url.split('#')[1]
else currentPage = 'index'
function changePage() {
    document.querySelectorAll('.content').forEach(e=>{
        if (e.id == currentPage)
            e.style.display = 'block'
        else e.style.display = 'none'
    })
}
changePage()
document.querySelectorAll('.content-link').forEach(a=>a.onclick=e=>{
    e.preventDefault()
    currentPage = a.href.split('#')[1]
    changePage()
})