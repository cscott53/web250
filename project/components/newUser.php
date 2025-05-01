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
        fetch('checkUser.php', {
            method: 'POST',
            body: JSON.stringify({
                first,
                last,
                username,
                password
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then((res) => res.json())
        .then((data) => {
            if (data.userExists) {
                alert('User already exists')
            } else if (data.userCreated) {
                //alert('User created successfully')
                location.href='?pg=loggedIn'
                document.cookie = `user=${username}; path=/web250/project/; max-age=7200;`;
                document.cookie = `loggedIn=true; path=/web250/project/; max-age=7200;`;
            } else {
                alert('Error creating user') //probably won't happen
            }
        }).catch((err) => {
            console.error(err)
            alert('Error creating user\n' + err)
        })
    }
</script>