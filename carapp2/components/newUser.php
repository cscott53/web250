<?php
    include 'db.php';
    include '../checks.php';
    try {
        $createTableQuery=<<<SQL
        create table if not exists users(
            id int primary key auto_increment,
            first varchar(20) default '',
            last varchar(20) default '',
            username varchar(50) not null unique,
            password varchar(50) not null
        );
        SQL;
        $crRes=$mysqli->query($createTableQuery);
        if (!checkIfUserExists($mysqli,'web250User')) {
            //user for testing
            $insertQuery=<<<SQL
            insert into users(username,password) values('web250User','LetMeIn!');
            SQL;
            $insRes=$mysqli->query($insertQuery);
        }
    } catch (Throwable $th) {
        echo $th;
    }
?>
<h2>New User</h2>
<form>
    <div class="formrow"><label for="first">First name</label>
    <input type="text" id="first"></div>
    <div class="formrow"><label for="last">Last name</label>
    <input type="text" id="last"></div>
    <div class="formrow"><label for="username">Username</label>
    <input type="text" id="username" required></div>
    <div class="formrow"><label for="password">Password</label>
    <input type="password" id="password" required></div>
    <div class="formrow"><label for="confirmPass">Confirm password</label>
    <input type="password" id="confirmPass" required></div>
    <button id="signUp" type="button">Sign up</button>
</form>
<p>Already a user? <a href="?pg=login">Login</a></p>
<script>
    document.getElementById('signUp').onclick=() => {
        let first=document.getElementById('first').value,
            last=document.getElementById('last').value,
            username=document.getElementById('username').value,
            password=document.getElementById('password').value,
            confirmPass=document.getElementById('confirmPass').value
        if (password != confirmPass) {
            alert('Passwords do not match')
            return
        }
        HTTPRequest.post('checkUser.php', {first, last, username, password}, (res) => {
            res.json().then((data) => {
                if (data.userCreated) {
                    location.href = '?pg=userTable'
                    document.cookie = `user=${username}; path=/web250/carapp2/; max-age=7200;`;
                    document.cookie = `loggedIn=true; path=/web250/carapp2/; max-age=7200;`;
                } else if (data.userExists)
                    alert('Username already exists');
                else if (data.error)
                    alert('Error:\n' + data.error);
            }).catch((error) => {
                console.error('Error:', error);
                alert('Error:\n' + error);
            });
        }, {'Content-Type': contentType.json});
    }
</script>