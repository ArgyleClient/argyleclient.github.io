
<?php
    require('db.php');
    // When form submitted, insert values into the database.

    

    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $uid = stripslashes($_REQUEST['uid']);
        //escapes special characters in a string
        $uid = mysqli_real_escape_string($con, $uid);
        $user    = stripslashes($_REQUEST['user']);
        $user    = mysqli_real_escape_string($con, $user);
        $hwid = stripslashes($_REQUEST['hwid']);
        $hwid = mysqli_real_escape_string($con, $hwid);
        $query    = "INSERT into `login` (UID, HWID, NICKNAME)
                     VALUES ('$uid', '$user', '$hwid')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }

 ?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form method="post">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">account_circle</i>
                </div>
                <input id="uid" placeholder="UID" type="text" required class="validate" autocomplete="off" name = "uid">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="user" placeholder="Username" type="text" required class="validate" autocomplete="off" name = "user">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="hwid" placeholder="HWID" type="password" required class="validate" autocomplete="off" name = "hwid">
            </div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">code</i>
                </div>
                <input id="invite" placeholder="Invite Key" type="password" required class="validate" autocomplete="off" name = "invite">
            </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">I accept Terms of Service</span>
            </div>

            <input type="submit" value="Register" />
        </form>

    </div>
</body>

</html>
