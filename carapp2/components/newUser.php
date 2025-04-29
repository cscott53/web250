<?php
    include 'db.php';
    include '../checks.php';
    try {
        $createTableQuery=<<<SQL
        create table if not exists users(
            id int primary key auto_increment,
            first varchar(20) not null,
            last varchar(20) not null,
            username varchar(50) not null unique,
            password varchar(50) not null
        );
        SQL;
        $crRes=$mysqli->query($createTableQuery);
        /* if (!checkIfUserExists($mysqli,'web250teacher')){
            //user for testing
            $insertQuery=<<<SQL
            insert into users(name,username,password) values('web250teacher','web250teacher','DapperViper666');
            SQL;
            $insRes=$mysqli->query($insertQuery);
        } */
    } catch (Throwable $th) {
        echo $th;
    }
?>
<h2>New User</h2>
<form>
    <div class="formrow"><label for="first">First name</label>
    <input type="text" id="first" required></div>
    <div class="formrow"><label for="last">Last name</label>
    <input type="text" id="last" required></div>
    <div class="formrow"><label for="username">Username</label>
    <input type="text" id="username" required></div>
    <div class="formrow"><label for="password">Password</label>
    <input type="password" id="password" required></div>
    <div class="formrow"><label for="confirmPass">Confirm password</label>
    <input type="password" id="confirmPass" required></div>
    <button id="signUp" type="button">Sign up</button>
</form>
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
                alert('User created successfully')
                currentPage='userTable'
                changePage()
            } else {
                alert('Error creating user')
            }
        }).catch((err) => {
            console.error(err)
            alert('Error creating user\n' + err)
        })
    }
</script>