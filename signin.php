<html>
<head>
<title> Login Page </title>
</head>
<body>

<?php

if(!isset($_POST['submit'])){
?>
	<form action='<?=$_SERVER['PHP_SELF']?>' method="post" id="myform">
	Username: <input type="text" name="username" id="username"><br><br>
	Password: <input type="password" name="password" id="password"><br><br>
	<input type="submit" name="submit" value="Login">
	</form>
	
<?php
}else{
	session_start();
	$_SESSION['user'] = $_POST['username'];
	$dbc = mysqli_connect('localhost','root','','test');
	if(!$dbc)
		echo 'not connected';
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	
	$query = mysqli_query($dbc,"SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");
	$row = mysqli_affected_rows($dbc);
	
	if($row == 0){
		echo '<script>';
		echo 'alert("Invalid credentials")';
		echo '</script>';
		header("refresh:0;url=http://localhost:81/work/signin.php");		
	} else {
		header("Location: http://localhost:81/work/test.php");
		echo "<br>Logged in successfully";
		}
}
?>
</body>
</html>