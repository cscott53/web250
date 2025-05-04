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
                HTTPRequest.post('session.php', {
                    loggedIn: true,
                    user: username
                }, (res) => {
                    res.json().then((data) => {
                        console.log(data);
                        if (!data.success) alert('Error logging in');
                        else {
                            document.cookie = `PHPSESSID=${data.PHPSESSID}; path=${location.pathname}; expires=${expireInHours(1)}`;
                            location.href = '?pg=loggedIn';
                        }
                    }).catch((error) => {
                        console.error('Error:', error);
                        alert('Error:\n' + error);
                    });
                });
                } else alert('Invalid username or password');
            }).catch((error) => {
                console.error('Error:', error);
                alert('Error:\n' + error);
            });
        });
    }
</script>