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
        include('game-data.php');

        $data = $_POST['submit'];

        if(isset($_POST['submit_answer'])){
			$game_answer = $_POST['uanswer'];
            $user_code = $_POST['user_code'];
		}
    ?>
</body>
        <form action="results.php" method="post">
            <strong><label for="uanswer"><?=$questions[$data];?></label></strong>
            <input type="text" name="uanswer"><br>
            <input type="hidden" name="user_code" value=<?=$data;?>>
            <input type="submit" name="submit_answer" value="Submit">
        </form>
</html>