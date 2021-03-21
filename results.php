<?php 
    include('game-data.php');
    $game_question = $_POST['user_code'];
    $game_answer = strtolower($answers[$game_question]);
    $user_answer = strtolower($_POST['uanswer']);
    $score = $_COOKIE["score"];
    $count = $_COOKIE["count"];
    setcookie('count', $count + 1);
    setcookie('$game_question', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <p>Well Done! You got it right!</p>
        <label>Current Money $<?= $score?></label>
        <br>
        <a href="./game.html">Back to questions</a>
    </div>
<?php
     } else {
?>
    <div>
        <p>Unlucky! Your answer was not correct</p>
        <label>Current Money $<?= $score?></label>
        <br>
        <a href="./game.html">back</a>
    <?php
        }
    ?>
    <?php
            if($_COOKIE['count'] == 11) {
        ?>
        <a href="./final.html">Exit Game</a>
        <?php
            }
        ?>
    </div>
</body>
</html>