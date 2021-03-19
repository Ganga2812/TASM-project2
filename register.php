<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PHP Jeopardy</title>
                <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="main">
            <div class="form">
                <form action="register-submit.php" method="post" class="login-form">
                    <h1>Sign Up</h1>
                    <input class="form-input" type="text" name="username" placeholder="username">
                    <input class="form-input" type="password" name="password" placeholder="password">
                    <input type="submit" value="create">
                    <p>Already registered? <a href="login.php">Sign In</a></p>
                </form>
            </div>
        </div>
    </body>
</html>