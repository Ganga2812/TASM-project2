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
    <?php /*print_r($_COOKIE);
                foreach ($_COOKIE as $key => $value) {
                    if(preg_match('/^[a-zA-Z]*_[1-9]$/', $key)){
                        print($key.'<br>');
                        //unset($_COOKIE[$key])
                        //setcookie($key, 0, time()-1);
                    }
                } */
    ?>
    <?php if(!array_key_exists($data, $_COOKIE)): ?>
        <form action="results.php" method="post">
            <strong><label for="uanswer"><?=$questions[$data];?></label></strong>
            <input type="text" name="uanswer"><br>
            <input type="hidden" name="user_code" value=<?=$data;?>>
            <input type="submit" name="submit_answer" value="Submit">
        </form>
    <?php else: ?>
        <h2>You've already done this question. Please pick another one.</h2>
        <a href='game.php'><button type="button">Go Back</button></a>
    <?php endif; ?>
</body> 

<style>

body{
	text-align: center;
	background-color: navy;
	margin-left: 5px;
	margin-top: 200px;
}

h2{
	font-family: Impact;
}
	

button{
	background-color: black;
	font-size: 30px;
	font-weight: bold;
	font-family: Impact;
	color: goldenrod;
	position: center;
	width: 15%;
	height: 20%;
	text-align: center;
	

}

</style>
        
</html>
