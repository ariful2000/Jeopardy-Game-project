<!DOCTYPE html>
<html>
   <head>
      <title>Login</title>
	  <link href="style.css" rel="stylesheet" type="text/css">
	  <?php
   ob_start();
   session_start();
   
   if(!isset($_COOKIE['abc'])) {
	   
		$a = array();
		array_push($a);
		$b = serialize($a);
		setcookie('abc',$b , time() + (86400 * 3), "/");
   }
?>
     <script>
      function validate() {
 var elem_1 = document.getElementById('username');
 var elem_2 = document.getElementById('password');

 var inp_1 = elem_1.value;
 var inp_2 = elem_2.value;

 if (inp_1 == "" && inp_2 == "") {
  alert("You cannot leave these fields blank!!!");
  elem_1.focus();
 } else if (inp_1 == ""){
  alert("You need to enter a username!!!");
  elem_1.focus();
 } else if (inp_2 == ""){
  alert("You need to enter password!!!");
  elem_2.focus();
 } else if (inp_1 != "" && inp_2 != "guest"){
  alert("Entered password is wrong!!! Retry");
  elem_2.focus();
}else {
   alert("Correct Inputs!!!");
  }
} 
     
     
     </script>
   </head>
   <body>
   
   
   <form action = "signup-submit.php" method="post" class="form">
   <fieldset>
		<legend>New User Signup:</legend>
			
		<strong>username:</strong><input type="text" name="username" size="16"/><br>
		<strong>password:</strong><input type="text" name="password" size="16"/><br>
			
		<input type="submit" value="Sign Up"/>			
		</fieldset>
		
		
		<?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password']) && $_POST['postback']) {
				
               if (strlen($_POST['username'])>0 && 
                  $_POST['password'] == 'guest') {
					  
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $_POST['username'];
				  $_SESSION['question_number'] = 1;
				  $_SESSION['iscorrect'] = false;
				  $_SESSION['score'] = 0;
				  $_SESSION['final_prize'] = 0;
				  
				  
				  
				  setcookie('cookie', serialize($info), time()+3600);
				  header("location: game_start.php"); exit;
                  
               }else {
				  echo 'Something went wrong. Check the details!!! ';                
               }
            }
         ?>
		 
		 <h1 id="heading"> Who wants to be a CS Major </h1>
		<!--<div id="image">
        </div>-->
      <div class="pageContainer centerText">
	  
         <p>Enter Username and Password</p>

		 <form class = "formLayout" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
			
			
			<div class="formGroup">
               <label>Username:</label>
               <input type="text" name="username" class="textbox" id="username" placeholder="Username" maxlength="50" autofocus />
            </div>
            <div class="formGroup">
               <label>Password:</label>
               <input type="password" name="password" class="textbox" id="password" autofocus placeholder="Password" title="password(guest)" maxlength="20" />
            </div>
			
			<input type="hidden" name="postback" value="true">
			
			<div class="formGroup">
				<label></label>
				<button  type = "submit" name = "login" onclick="validate()">Login</button>
			</div>
         </form>
      </div>


   </body>
</html>