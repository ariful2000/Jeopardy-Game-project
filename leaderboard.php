<?php
session_start();
$answer = trim($_POST["answer"]);
$correct = trim($_POST["correct"]);
$q = $_POST["q"];
$score = $_POST["score"];

if($answer==$correct){
    $answerlist = $_SESSION["answered"];
    $_SESSION["answered"] = (string)$answerlist . (string)$q . ",";
    $sessionscore = $_SESSION["score"];
    $_SESSION["score"] = (string)($sessionscore + $score);
}

print_r($_SESSION["answered"]);
print_r($_SESSION["score"]);
$username = "matt";
$scorelist = array();

$myfile = fopen("score.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
    $player = explode(",", fgets($myfile));
    $scorelist[$player[0]] = $player;
}

fclose($myfile);
var_dump($scorelist);
$scorelist[$username] = [$username, $_SESSION["score"]];
?>
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>
<body>


<table class="menu">
  <tr>
  <th>Name</th>
  <th>Points</th>
  </tr>
  <?php foreach($scorelist as $score){?>
  <tr>
  <td><?php echo $score[0]; ?></td>
  <td><?php echo $score[1]; ?></td>
  </tr>
  <?php } ?>

</table>
<button href="endgame.php">end game</game>

</body>
</html>