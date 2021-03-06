<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Jeopardy</title>
</head>
<body>
	<?php
		if(isset($_POST['submit'])){
			$user_code = $_POST['submit'];
		}
	?>

    
	<div class='score'>
		<h4>Current Score: $<?= $_COOKIE['score']; ?></h4>
	</div>

	<div class='quit'>
	<a href='final.php'><button type="button2" class=quit>Quit Game</button></a>	
	</div>

    <form action="game-question.php" method='post'>
        <div class='card_container header'>
			<div class="front">6-letter countries
			</div>
		</div>

        <div class='card_container header'>
			<div class="front">Science Time 
			</div>
		</div>
        <div class='card_container header'>
			<div class="front">4 letters 3 syllables 
			</div>
        </div>
        <div class='card_container header'>
			<div class="front">Midwest Cities
			</div>
		</div>
        <div class='card_container'>
			<button type="submit" value="one_1" name='submit'>$100</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="one_2" name='submit'>$100</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="one_3" name='submit'>$100</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="one_4" name='submit'>$100</button>
		</div>

        <div class='card_container'>
			<button type="submit" value="two_1" name='submit'>$200</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="two_2" name='submit'>$200</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="two_3" name='submit'>$200</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="two_4" name='submit'>$200</button>
		</div>

        <div class='card_container'>
			<button type="submit" value="three_1" name='submit'>$300</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="three_2" name='submit'>$300</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="three_3" name='submit'>$300</button>
		</div>
        <div class='card_container'>
			<button type="submit" value="three_4" name='submit'>$300</button>
		</div>
    </form>
</body>
</html>
