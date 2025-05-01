<p>Successfully logged out</p>
<a href="?pg=login">Login</a>
<script>
    let today = new Date();
    today.setTime(today.getTime() - (1000 * 60 * 60 * 24));
    let expires = today.toUTCString();
    document.cookie = 'loggedIn=; path=/web250/project/; expires=' + expires;
    document.cookie = 'user=; path=/web250/project/; expires=' + expires;
</script>