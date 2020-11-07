<?php
session_start();

$q = (int)$_GET["q"];
$q;
$list = array();
$myfile = fopen("questions.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($list,explode(",", fgets($myfile)));
}

fclose($myfile);
// read from file
$question = $list[$q-1][0];
$ans =  $list[$q-1][1];
$score =  $list[$q-1][2];
echo $ans;
?>
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css" /></head>
<body>
  <div class="page">
    <h3><?php echo $question;?></h3>
    <form method="post" action="leaderboard.php">
        <input type="text" name="answer" >
        <input type="hidden" name="correct" value="<?php echo $ans; ?>">
        <input type="hidden" name="q" value="<?php echo $q; ?>">
        <input type="hidden" name="score" value="<?php echo $score; ?>">
        <input type ="submit" value="submit" >
    </form>
  </div>
</body>
</html>