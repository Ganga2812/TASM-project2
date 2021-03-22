<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="finalstyle.css">
</head>
<title>Jeopardy!</title>
<body>

  <h1> <strong>Thanks for Playing!</strong>&emsp;</h1>





<?php 
// Reading leaderboard.txt
$lines = file('leaderboard.txt');

$high_scores = array();

foreach($lines as $line){
    $temp = explode(",", $line);
    if($temp[0] == $_COOKIE["Username"]){
        if(trim($temp[1]) < $_COOKIE['score']){
            $high_scores[$_COOKIE["Username"]] = trim($_COOKIE['score']);
        }
    }
    else{
        $high_scores[$temp[0]] = trim($temp[1]);
    }
}

if(!array_key_exists($_COOKIE["Username"], $high_scores)) {
    $high_scores[$_COOKIE["Username"]] = $_COOKIE['score'];
}

arsort($high_scores);

file_put_contents("leaderboard.txt", "");
$file = fopen("leaderboard.txt", "w");
foreach($high_scores as $k => $v){
    $str = $k.','.$v."\n";
    fwrite($file, $str); 
}
fclose($file);
?>

<?php /*if ($leaderboard) { 

echo $_COOKIE =["Username"];
$Username = $_SESSION["Username"]; */

?>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
    <?php
        if(empty($high_scores)){
    ?>
            <tr>
                <td colspan="2"><center>No scores available at this time.</center></td>
            </tr>
            
    <?php
        } else {
            $counter = 0;
            foreach($high_scores as $k => $v){
                if($counter > 4){
                    break;
                }
    ?>
                    <td><?= $counter+1 ?></td>
                    <td>
                        <b><?=$k ?></b>
                    </td>
                    <td><?= $v ?></td>
                </tr>
                <?php
                $counter = $counter + 1;
            }
        }
    ?>
	

    <a class="play" href="login.php">Play Again</a>
    <a class="play" href="login.php">New User</a>
  </div>
 <h2> Leaderboard</h2>

</body>
</html>