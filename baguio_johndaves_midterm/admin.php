<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>  
	<?php
			$conn= new mysqli('localhost','root','');
          $select= $conn->select_db('event_booking');
			session_start();
			echo "<h3>".$_SESSION['name']."<h3>";
			echo	'<form action="" method="POST">
								<input type="submit" name="logout" value="Logout"><br><br>
								</form>';
			echo"<hr>";
				echo	'<form action="" method="POST">
								<input type="submit" name="createEvent" value="Create Event">
								<input type="submit" name="createUser" value="Create User"><br><br>
								</form>';


			if(isset($_POST['createEvent'])){
				echo"<h3>Create Event</h3>";
				echo '<form action="" method="POST" enctype="multipart/form-data">
								Event Name<input type="text" name="eventName"><br><br>
								Event Image<input type="file" name="file"><br><br><hr>
			
								<input type="submit" name="submit" value="Submit"><br><br>
								</form>';

			}else if(isset($_POST['createUser'])){
				echo"<h3>Create User</h3>";
				echo '<form action="" method="POST">
								Username<input type="text" name="username"><br><br>
								Password<input type="password" name="password"><br><br>
								Name<input type="text" name="name"><br><br>
								Email<input type="email" name="email"><br><br><hr>
								<input type="submit" name="register" value="Register"><br><br>
								</form>';
			}
			echo"<hr>";

			echo	'<form action="" method="POST" enctype="multipart/form-data">
								<input type="submit" name="display" value="Display Events"><br><br>
								</form>';

			if(isset($_POST['display'])){
				 $query = "SELECT * FROM `events_table`";
            	$result = $conn->query($query);
            	while($row =$result-> fetch_assoc()){
                    echo"<img src='{$row['event_image']}' style='width:150px; height:150px;'>"."<br><br>";
             		echo "Event Name:".$row['event_name']."<br><br>";
                     echo '<form action="" method="POST"> 
                         <input type="hidden" name="id" value="'.$row['event_id'].'"> 
                         <input type="submit" name="update" class="btn btn-success" value="Update">
                        <input type="submit" name="delete" class="btn btn-success" value="Delete">
                         </form>';
                    echo "<hr>";
             	}

			}

             if(isset($_POST['update'])){

                         $update = "SELECT * FROM events_table WHERE event_id='".$_POST['id']."'";
                         $updateQuery = $conn->query($update);
                         $updateResult = $updateQuery->fetch_assoc();

                   echo"<img src='{$updateResult['event_image']}' style='width:150px; height:150px;'>"."<br><br>";
                  echo '<form action="" method="post">
                            <input type="text" value= "'.$updateResult["event_name"].'" name="name" placeholder="Name">
                            <input type="hidden" name="id" value="'.$updateResult["event_id"].'">
                            <input type="submit" name="updateData"  value="Save">
                        </form>';
          }
			 if(isset($_POST['delete'])){
            $sql = "DELETE FROM events_table WHERE event_id='".$_POST['id']."'";
            if ($conn->query($sql) === TRUE) {
                    echo "<h3>Deleted Successfully</h3>";
            } else {
                    echo "Error: " . $conn->error;
                }

            }
          if(isset($_POST['updateData'])){
            $sql = "UPDATE events_table SET event_name='".$_POST['name']."'WHERE event_id='".$_POST['id']."'";

        if ($conn->query($sql) === TRUE) {
            echo "Id number:".$_POST['id']." updated successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }
      

			if(isset($_POST['register'])){
                $username= $_POST['username'];
                $password= $_POST['password'];
                $name= $_POST['name'];
                $email= $_POST['email'];

                $sql="INSERT INTO user_detail VALUES ('','$username','$password','$name','$email','User')";
                $conn->query($sql);
              }

			if(isset($_POST['submit'])){
                $eventName= $_POST['eventName'];
                $files=$_FILES['file'];
                $name1=$files['name'];
                $type=$files['type'];
                $tmp=$files['tmp_name'];
                $error=$files['error'];
                $size=$files['size'];
                $location='uploads/'.$name1;
                move_uploaded_file($tmp, $location);

                $sql="INSERT INTO events_table VALUES ('','$eventName','$location')";
                $conn->query($sql);
              }
			if(isset($_POST['logout'])){
				session_destroy();
				header('Location:login.php');
			}

	?>

</body>
</html>