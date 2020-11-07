<html>	
	<head>
		<title>jeopardy</title>
		
		<meta charset="utf-8" />
		
		<link href="style.css" type="text/css" rel="stylesheet" />
		
	</head>
	<body>
		
		
		<div>
			<?php
				$username = $_POST["username"];
				$password = $_POST["password"];
				$approve = true;
				
				$file = "https://codd.cs.gsu.edu/~nashfaq1/Project2/userinfo.txt";
				$myString = $username . "," . $password ."\n";
				
				#Robust page with form validation
				if(empty($username))
				{	
					$approve = false;
				}
				
				if(empty($password))
				{	
					$approve = false;
				}
				
				
				
				
				#check DB to see if name has been there.
				$matches = array();

				$handle = @fopen("https://codd.cs.gsu.edu/~nashfaq1/Project2/userinfo.txt", "r");
				if ($handle)
				{
					while (!feof($handle))
					{
						$buffer = fgets($handle);
						if(strpos($buffer, $username) !== FALSE)
							$matches[] = $buffer;
					}
					fclose($handle);
				}
				$user_info       = $matches[0];
				$user_info_array = explode(",",$user_info);
				$user_name       = $user_info_array[0];
				
				if(strcasecmp($user_name,$username)==0)
				{
					$approve = false;
				}
				
				
				
				
				if($approve)
				{
					file_put_contents($file,$myString,FILE_APPEND);
					?>
					<strong>Thank you!</strong><br />
					<p>Welcome to jeopardy, <?= $Name ?></p>
					<p>Now <a href= "questions.php">Lets Play!</a></p><br>
					<p><a href="https://codd.cs.gsu.edu/~nashfaq1/Project2/login.php"> Go back to main page.</a></p>
				<?php
				}
				else
				{
				?>
					<strong>Error! Invalid data</strong><br />
					<p>We are sorry. You submitted invalid user information. Please go back and try again</p>
					<br>
					<p><a href="https://codd.cs.gsu.edu/~nashfaq1/Project2/login.php"> Go back to main page.</a></p>
				<?php
				}
				?>
	
		<div>
	
	
	<?php	
	include 'Common.php';
	?>
	
	</body>
</html>