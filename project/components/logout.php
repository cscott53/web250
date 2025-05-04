<p>Successfully logged out</p>
<a href="?pg=login">Login</a>
<script>
    HTTPRequest.post('session.php', {
        loggedIn: false,
        user: ''
    }, (res) => {
        res.text().then((data) => {
            try {
                data = JSON.parse(data);
                if (!data.success) alert('Error logging out');
            } catch (error) {
                console.log(data);
                alert('Error:\n' + error);
            }
        }).catch((error) => {
            console.error('Error:', error);
            alert('Error:\n' + error);
        });
    });
</script>