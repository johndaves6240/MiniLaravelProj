<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

	<form action="" method="POST">
		<label>Name &nbsp &nbsp</label>
		<input type="text" name="name"><br><br>
		<label>Password</label>
		<input type="password" name="password"><br><br>
		<input type="submit" name="submit"><br><br>
		<!--  <a href="display.php">Display</a> -->
	</form>

		<?php
		session_start();
		include 'connection.php';
		$result= $conn->query("SELECT * FROM names");

			if(isset($_POST['submit'])){
				$username= $_POST['name'];
				$password=$_POST['password'];

				$result= $conn->query("SELECT * FROM names WHERE name='$username' AND password='$password'");

				if($row=$result->fetch_assoc()){
						$_SESSION['picture']=$row['profile_picture'];
						$_SESSION['name']=$row['name'];
						$_SESSION['course']=$row['course'];
				}


			}
				if(isset($_SESSION['name'])){
				echo"<img src='{$_SESSION['picture']}' style='width:250px; height:250px;'>"."<br><br>";
		echo $_SESSION['name']."<br>";
		echo $_SESSION['course']."<br>";
				echo	'<form action="" method="POST">
								<input type="submit" name="logout" value="Logout"><br><br>
								</form>';
		}
			if(isset($_POST['logout'])){
			session_destroy();
			header('Location: login.php');
		}

	?>

</body>
</html>