<h2>Login</h2>
<form>
    <div class="formrow"><label for="username">Username:</label>
    <input type="text" id="username" name="username" required></div>
    <div class="formrow"><label for="password">Password:</label>
    <input type="password" id="password" name="password" required></div>
    <button type="button" id="login">Login</button>
</form>
<p>New user? <a href="?pg=newUser">Register here</a></p>
<script>
    document.getElementById('login').onclick=() => {
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        HTTPRequest.post('loginCheck.php', {username, password}, (res) => {
            res.json().then((data) => {
                if (data.loggedIn) {
                    location.href = '?pg=userTable';
                    document.cookie = `user=${username}; path=/web250/project/; max-age=7200;`;
                    document.cookie = `loggedIn=true; path=/web250/project/; max-age=7200;`;
                } else alert('Invalid username or password');
            }).catch((error) => {
                console.error('Error:', error);
                alert('Error:\n' + error);
            });
        }, {'Content-Type': contentType.json});
    }
</script>