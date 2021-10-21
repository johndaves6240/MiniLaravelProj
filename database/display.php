<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php
		session_start();
		echo"<img src='{$_SESSION['picture']}' style='width:250px; height:250px;'>"."<br><br>";
		echo $_SESSION['name']."<br>";
		echo $_SESSION['course']."<br>";

		if(isset($_POST['logout'])){
			session_destroy();
			header('Location: login.php');
		}
	?>
	<form action='' method="POST">
		        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>