<?php 
    include('game-data.php');
    $game_question = $_POST['user_code'];
    $game_answer = strtolower($answers[$game_question]);
    $user_answer = strtolower($_POST['uanswer']);
    if(isset($_COOKIE["score"])){
        $score = $_COOKIE["score"];
    }

    if(isset($_COOKIE["count"])){
        $count = $_COOKIE["count"];
        setcookie('count', $count + 1);
    }

    setcookie($game_question, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="gamestyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
     if($user_answer == $game_answer){
         if(substr($game_question, 0, -2) == "one") {
             $score += 100;
             setcookie('score', $score);
         } else if (substr($game_question, 0, -2) == "two") {
            $score += 200;
            setcookie('score', $score);
         } else {
            $score += 300;
            setcookie('score', $score);
         }
?>
    <div>
        <h1>Well Done! You got it right!</h1>
        <label>Current Money $<?= $score?></label>
        <br>
        <a href="./game.php"><button type="button">back</button></a>
    </div>
<?php
     } else {
?>
    <div>
        <h1>Unlucky! Your answer was not correct</h1>
        <label>Current Money $<?= $score?></label>
        <br>
        <a href="./game.php"><button type="button">back</button></a>
    <?php
        }
    ?>
    <?php
            if($_COOKIE['count'] == 11) {
        ?>
        <a href="./final.php"><button type="button">Exit Game</button></a>
        <?php
            }
        ?>
    </div>
</body>

</html>
