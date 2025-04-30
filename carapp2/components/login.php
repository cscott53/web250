<h2>Login</h2>
<form>
    <div class="formrow"><label for="username">Username:</label>
    <input type="text" id="username" name="username" required></div>
    <div class="formrow"><label for="password">Password:</label>
    <input type="password" id="password" name="password" required></div>
    <button type="button" id="login">Login</button>
</form>
<script>
    document.getElementById('login').onclick=() => {
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        fetch('loginCheck.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.loggedIn) {
                alert('Login successful');
                location.href = '?pg=userTable';
            } else alert('Invalid username or password');
        });
    }
</script>