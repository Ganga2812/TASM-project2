<?php session_start();
    foreach ($_COOKIE as $key => $value) {
        if(preg_match('/^[a-zA-Z]*_[1-9]$/', $key)){
            //print($key);
            setcookie($key, 0, time()-99);
        }
    }

    if(isset($_POST['Submit'])) {
        $accounts = array('admin' => 'admin');
        $username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $password = isset($_POST['Password']) ? $_POST['Password'] : '';
        $error = "username/password incorrect";

        if(isset($_POST['check'])) {
            setcookie('Username', $username, time()+(86400*30));
            setcookie('Password', $password, time()+(86400*30));
            setcookie('score', 0);
            setcookie('count', 0);
        } else {
            setcookie('Username', $username, time()-1);
            setcookie('Password', $password, time()-1);
            setcookie('score', 0, time()-1);
            setcookie('count', 0, time()-1);
        }

        $file = file("accounts.txt");
        for ($i = 0; $i < count($file); $i++) {
            $temp = explode(",", $file[$i]);
            $tempk = $temp[0];
            $tempv = $temp[1];
            $temp3 = rtrim($tempv);
            $accounts[$tempk] = $temp3;
        }
        if (isset($accounts[$username]) && $accounts[$username] == $password) {
            $_SESSION['Userdata']['Username']=$accounts[$username];
            $_SESSION['Username']=$username;
            header("location:game.php");
            exit;
        } else {
                $_SESSION["error"] = $error;
                $error = $_SESSION["error"];
                echo "<span>$error</span>";

        }
    }

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
                <form action="" method="post" class="login-form">
                    <h1>Login</h1>
                    <input class="form-input" type="text" name="Username" placeholder="username" value="<?php echo @$_COOKIE['Username']; ?>">
                    <input class="form-input" type="password" name="Password" placeholder="password" value="<?php echo @$_COOKIE['Password']; ?>">
                    <input class="check" type="checkbox" name="check" checked>
                    <label for="check">Remember Me</label>
                    <input class="form-input" type="submit" name="Submit" value="LOGIN">
                    <p>Register here <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>
</html>
