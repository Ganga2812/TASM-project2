<?php session_start();

    if(isset($_POST['Submit'])) {
        $accounts = array('admin' => 'admin');
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
        $error = "username/password incorrect";

        if(isset($_POST['check'])) {
            setcookie('Username', $Username, time()+(86400*30));
            setcookie('Password', $Password, time()+(86400*30));
            setcookie('score', 0, time()+(86400*30));
            setcookie('count', 0, time()+(86400*30));
        } else {
            setcookie('Username', $Username, time()-1);
            setcookie('Password', $Password, time()-1);
            setcookie('score', 0, time()-1);
            setcookie('count', 0, time()-1);
        }

        $file = file("accounts.txt");
        for ($i = 0; $i < count($file); $i++) {
            $temp = explode(",", $file[$i]);
            $k = $temp[0];
            $tempv = $temp[1];
            $v = rtrim($tempv);
            $accounts[$k] = $v;
        }
        print_r($accounts);
        if (isset($accounts[$Username]) && $accounts[$Username] == $Password) {
            $_SESSION['Userdata']['Username']=$accounts[$Username];
            $_SESSION['Username']=$Username; // username
            header("location:game.html");
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
                    <p>Not registered? <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>
    </body>
</html>