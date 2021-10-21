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
								<input type="submit" name="display" value="Display Events">
								<input type="submit" name="booked" value="Booked Events"><br><br>
								</form>';
				if(isset($_POST['display'])){
				 $query = "SELECT * FROM `events_table`";
            	$result = $conn->query($query);
            	while($row =$result-> fetch_assoc()){
                    echo"<img src='{$row['event_image']}' style='width:150px; height:150px;'>"."<br><br>";
             		echo "Event Name:".$row['event_name']."<br><br>";
                     echo '<form action="" method="POST"> 
                         <input type="hidden" name="id" value="'.$row['event_id'].'"> 
                         <input type="submit" name="book" class="btn btn-success" value="Book">
                         </form>';
                    echo "<hr>";
             	}

			}

			if(isset($_POST['book'])){
				 $event_id= $_POST['id'];
                $user_id= $_SESSION['user_id'];
                $sql="INSERT INTO bookings_table VALUES ('','$event_id','$user_id')";
                $conn->query($sql);
			}

			if(isset($_POST['booked'])){
				$result=$conn->query("SELECT * FROM events_table INNER JOIN bookings_table ON bookings_table.event_id= events_table.event_id");
				while($row= $result->fetch_assoc()){
            			echo"<img src='{$row['event_image']}' style='width:150px; height:150px;'>"."<br><br>";
            			echo "Event Name:".$row['event_name']."<br><br>";
            			 echo '<form action="" method="POST"> 
                         <input type="hidden" name="id" value="'.$row['event_id'].'"> 
                         <input type="submit" name="delete" class="btn btn-success" value="Cancel">
                         </form>';
       		 }
			}

			 if(isset($_POST['delete'])){
            $sql = "DELETE FROM bookings_table WHERE event_id='".$_POST['id']."'";
            if ($conn->query($sql) === TRUE) {
                    echo "<h3>Deleted Successfully</h3>";
            } else {
                    echo "Error: " . $conn->error;
                }

            }




			if(isset($_POST['logout'])){
				session_destroy();
				header('Location:login.php');
			}

	?>

</body>
</html>