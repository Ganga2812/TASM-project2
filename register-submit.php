<?php

$username = $_POST["username"];
$password = $_POST["password"];
$filename = 'accounts.txt';
$file = file($filename);
$users = [];

for ($i = 0; $i < count($file); $i++) {
    $temp = explode(",", $file[$i]);
    $k = $temp[0];
    $users[$i] = $k;
}

$error = false;
$exists = false;

if (empty($username) || empty($password)) {
    $error = true;
}

foreach ($users as $u) {
    if ($u == $username) {
        $exists = true;
    }
}
if (!$error && !$exists) {
    $new_user = array($username,$password . "\n");
    $str = join(',', $new_user);
    file_put_contents($filename, $str, FILE_APPEND);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Jeopardy</title>
           <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="main">
        <?php if ($error) { ?>
            <h1>Error!</h1>
            <p>Sorry, you've left a field empty. Try again.</p><br>
            <a href="register.php">back</a>
        <?php } else if ($exists) { ?>
            <h1>Error!</h1>
            <p>Sorry, your username is taken. Try again.</p><br>
            <a href="register.php">back</a>
        <?php } else { ?>
            <h1>Welcome, <?= $username ?>!</h1>
            <a href="index.php">continue</a>
        <?php } ?>
        </div>
    </body>
</html>
