<?php session_start();

    if(isset($_POST['Submit'])) {
        $accounts = array('admin' => 'admin');
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

        if(isset($_POST['check'])) {
            setcookie('Username', $Username, time()+(86400*30));
            setcookie('Password', $Password, time()+(86400*30));
        } else {
            setcookie('Username', $Username, time()-1);
            setcookie('Password', $Password, time()-1);
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
            $_SESSION['Userdata']['Username']=$accounts[$Username]; // password
            $_SESSION['Username']=$Username; // username
            header("location:gameboard.php");
            exit;
        } else {
            $msg= "<span style='color:#ff0000'>Invalid Login Details</span>";
            echo $msg;
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PHP Jeopardy</title>
        <style>
            @font-face {
                font-family: GyparodyHV;
                src: url("fonts/gyparodyhv.ttf");
            }
            @font-face {
                font-family: GyparodyRG;
                src: url("fonts/gyparodyrg.ttf");
            }
            body {
                height: 100vh;
                width: 100vw;
                background-color: #2a3698;
            }
            h1 {
                color: white;
                text-align: center;
            }
            .main {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
            }
            .form {
                position: relative;
                background: #FFFFFF;
                margin: 0 auto;
                padding: 3rem;
                text-align: center;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            .form-input {
                font: 0.8rem GyparodyRG, sans-serif;
                outline: 0;
                background: #f2f2f2;
                width: 100%;
                border: 0;
                margin: 0 0 1rem;
                padding: 1rem;
                box-sizing: border-box;
            }
            .form-input[type="submit"] {
                text-transform: uppercase;
                background: #1155CC;
                color: white;
                cursor: pointer;
            }
            .form-input[type="submit"]:hover {
                background: #0d419d;
            }
            .form h1 {
                font: 3rem GyparodyRG, sans-serif;
                color: #1155cc;
            }
            .form p {
                font: 0.75rem "Roboto Light", sans-serif;
                margin: 0.5rem 0 0;
            }
            .check {
                float: left;
                margin-right: 0.5rem;
                margin-bottom: 1rem;
            }
            .form label {
                float: left;
                font: 0.75rem "Roboto Light", sans-serif;
                padding-top: 0.2rem;
            }
        </style>
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