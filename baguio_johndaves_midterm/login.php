<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
			<h3>Admin--username:admin password:admin123</h3>
	<div style="text-align: center">
	<form action="" method="POST">
		<label>Username&nbsp &nbsp</label>
		<input type="text" name="username"><br><br>
		<label>Password</label>
		<input type="password" name="password"><br><br>
		<input type="submit" name="login"><br><br>
	</form>
	</div>
	<?php
		$conn= new mysqli('localhost','root','');
          $select= $conn->select_db('event_booking');
            $result= $conn->query("SELECT * FROM users_table");


		session_start();


          if(!$select){
            $conn->query("CREATE DATABASE event_booking");

            $conn->select_db('event_booking');

            $conn->query("CREATE TABLE user_detail(
                  user_id int(2) AUTO_INCREMENT,
                  username varchar(50),
                  password varchar(50),
                  name varchar(50),
                  email varchar(10),
                  user_type ENUM('Admin','User'),
                  PRIMARY KEY (user_id)
            )");
            $conn->query("CREATE TABLE events_table(
                  event_id int(2) AUTO_INCREMENT,
                  event_name varchar(50),
                  event_image varchar(50),
                  PRIMARY KEY (event_id)
            )");
            $conn->query("CREATE TABLE bookings_table(
                  booking_id int(2) AUTO_INCREMENT,
                  event_id varchar(50),
                  user_id varchar(50),
                  PRIMARY KEY (booking_id)
            )");

            $sql="INSERT INTO `user_detail`(`user_id`, `username`, `password`, `name`, `email`, `user_type`) VALUES ('','admin','admin123','administrator','admin@gmail.com','admin')";
             $conn->query($sql);
            }


      		if(isset($_POST['login'])){
				$username= $_POST['username'];
				$password=$_POST['password'];

				$result= $conn->query("SELECT * FROM user_detail WHERE username='$username' AND password='$password'");

				if($row=$result->fetch_assoc()){
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['name']=$row['name'];
						$_SESSION['user_type']=$row['user_type'];
					
				}
			}
			

      if(isset($_SESSION['name'])){
        if($_SESSION['user_type']==='Admin'){
          header('Location: admin.php');
     	 }else  if($_SESSION['user_type']==='User'){
          header('Location: user.php');
      }
      }
        // }else if($_SESSION['user_type']==='Employee'){
        //   header('Location: user.php');
        // }
    
	

	?>

</body>
</html>