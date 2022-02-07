<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>MELC Genomics - Framework for DNA Assembly</title>
		<meta charset="UTF-8" />
		<!-- Estilos da Index.php -->
		<style type="text/css">
			body{
			background: radial-gradient (#f0f9ff 10%, #cbebff 47%, #a1dbff 100%);
			}
			div.global{
			width: 20%;
			height: auto;
			background-color: #fff;
			border: 1px solid #606060;
			padding: 50px;
			box-shadow: 0px 0px 90px #000;
			margin-top: 10%;
			/* Centralizando a div 
			
			*O atributo text-align foi depreciado. 
			
			*/
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			}
			input[type='text'], input[type='password']{
			width: 200px;
			height: 25px;
			border: solid 1px #606060;
			border-radius: 5px;
			}
			input[type='password']{
			margin-left: 10px;
			}
			
			input[type='submit']{
			width: 250px;
                        height: 35px;
                        border: solid 3px #606060;
                        border-radius: 5px;
			}
		</style>
	</head>
	<body>
		<div class="global">

<form name="" action="" method="post">
		<label><img alt="" src="figure/username.jpg" style="width: 31px; height: 34px;" />&nbsp;&nbsp;&nbsp;<input type="text" id="username" name="username" /></label><br /><br />
		<label><img alt="" src="figure/password.png" style="width: 32px; height: 33px;" /><input type="password" id="password" name="password" /></label><br /><br />
   <input name="submit" type="submit" value ="LOGIN">
</form>

<br>
<br>

<?php
$email = shell_exec('head .contact.txt');
echo 'Forgot password? Contact your system administrator <a href="mailto:'.$email.'?subject=Reset%20Password">here<a>.';
?>

<?php
    $user = @$_REQUEST['username'];
    $password = @$_REQUEST['password'];
    $submit = @$_REQUEST['submit'];
    $myFile = ".users.txt";
    $contents = file_get_contents($myFile);
    $contents = explode("\n", $contents);

foreach($contents as $values){
     $loginInfo = explode(":", $values);
        $user = $loginInfo[0];
        $password = $loginInfo[1];

if($submit){
    if($user == "" || $password == ""){
        echo '<script>alert("Please verify your username and password.");</script>';
	}
	else{
           if($user == $_POST['username'] && $password == $_POST['password']){
		session_start();
		$_SESSION['username']=$user;
		$_SESSION['password']=$password;
		header("Location: principal.html");
       	   }
	else{
           echo '<script>alert("Please verify your username and password.");</script>';
		}
  	    }
	}
}
?>
		</div>

</body>
</html>	
