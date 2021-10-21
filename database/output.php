<!DOCTYPE html>
<html>
    <head>
        <title>Output Page</title>
        <style>
            body{font-family: Tahoma,Ariel;background-color: #D2EDED;}
            h1 {text-align: center;}
            p {text-align: center;}
            div {text-align: center;background-color: #DDF4F5;margin-left: 50px;margin-right: 50px;}
            a {background-color: #000080;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
                margin:32px;
            }
        </style>
    </head>
    <body>
        <div>

            <h1>Form Collection</h1>
            <?php
             $conn= new mysqli('localhost','root','','new_database');
             if($conn-> connect_error){
             		die("Connection failed:". $conn-> connect_error);
             }



             $query = "SELECT * FROM names order by id asc";
            $result = $conn->query($query);

             $y=0;
             // if($result->num_rows > 0){
             	echo "<hr>";
             	while($row =$result-> fetch_assoc()){
             		$y++;
             		// print_r($row);
             		echo"<h3>Form {$y}</h3>";
                    echo"<img src='{$row['profile_picture']}' style='width:250px; height:250px;'>"."<br><br>";
             		echo "Name:".$row['name']."<br><br>";
                    echo "E-mail:".$row['email']. "<br><br>";
                    // echo "Password:".$row['password']. "<br><br>";
                    echo "Course:".$row['course']. "<br><br>";
                     echo '<form action="" method="POST"> 
                         <input type="hidden" name="id" value="'.$row["id"].'"> 
                         <input type="submit" name="update" class="btn btn-success" value="Update">
                        <input type="submit" name="delete" class="btn btn-success" value="Delete">
                        <input type="submit" name="count" class="btn btn-success" value="Count">
                         </form>';
                    echo "<hr>";
             	}

             	if(isset($_POST['count'])){
             	$result = $conn->query("SELECT group_table.group_name, COUNT(*) as count FROM names,group_table WHERE names.group_id=group_table.group_id  GROUP BY group_table.group_id");
             	while($row=$result->fetch_assoc()){
             		// print_r($row);
             		echo "Group:".$row['group_name']."<br>";
             		echo "Count:".$row['count']."<br><br>";
        		 }
        		}
        		// CONCAT(names.name,'',names.course)
        		// if(isset($_POST['count'])){
          //    	$result = $conn->query("SELECT CONCAT(names.name,'',names.course) as guest, COUNT(*) as count FROM names WHERE group_id='3'  GROUP BY name");
          //    	print_r($result);
          //    	while($row=$result->fetch_assoc()){
          //    		print_r($row);
          //    		echo "Name:".$row['guest']."<br>";
          //    		echo "Count:".$row['count']."<br><br>";
        		//  }
        		// }

          //    	if(isset($_POST['count'])){
          //    		$sql="CREATE USER 'patrickkyle' @'localhost' IDENTIFIED BY 'mypassword'";
          //    		$conn->query($sql);
          //    		$sql="GRANT ALL PRIVILEGES ON new_database. * TO 'patrickkyle' @'localhost'";
          //    		$conn->query($sql);
          //    	$result = $conn->query("SELECT names.name,names.group_id FROM names, group_table WHERE names.group_id=group_table.group_id");
          //    	while($row=$result->fetch_assoc()){
          //    		print_r($row);
          //    		echo "Name:".$row['name']."<br>";
          //    		echo "Group:".$row['group_id']."<br><br>";
        		//  }
        		// }
        		// if(isset($_POST['count'])){
          //    	$result = $conn->query("SELECT group_name FROM group_table WHERE group_id  NOT IN(SELECT DISTINCT group_id FROM names)");
          //    	while($row=$result->fetch_assoc()){
          //    		print_r($row);
          //    		echo "Group:".$row['group_name']."<br>";
          //    		echo "Count:".$row['count']."<br><br>";
        		//  }
        		// }
        	
        
        	
							

          //        if(isset($_POST['update'])){

          //                $update = "SELECT * FROM names WHERE id='".$_POST['id']."'";
          //                $updateQuery = $conn->query($update);
          //                $updateResult = $updateQuery->fetch_assoc();

          //         echo '<div style="float:right"><form action="update.php" method="post" enctype="multipart/form-data">
          //                   <input type="text" value= "'.$updateResult["name"].'" name="name" placeholder="Name">
          //                   <input type="email" value= "'.$updateResult["email"].'" name="email" placeholder="Email">
          //                   <input type="text" value= "'.$updateResult["course"].'" name="course" placeholder="Course">
          //                   <input type="file" name="file"> <br> <br>
          //                   <input type="hidden" name="id" value="'.$updateResult["id"].'">
          //                   <input type="submit" name="updateData"  value="Save">
          //               </form></div>';
          // }
        
      //   if(isset($_POST['updateData'])){

      //        // if(isset($_FILES['file'])&&($_FILES['file'])!=""){
      //           // $files=$_FILES['file'];
      //           // $name1=$files['name'];
      //           // $type=$files['type'];
      //           // $tmp=$files['tmp_name'];
      //           // $error=$files['error'];
      //           // $size=$files['size'];
      //           // $location='uploads/'.$name1;
      //           // unlink('uploads/'.$name1);
      //         // move_uploaded_file($tmp, $location);
      //        // }

      //       $sql = "UPDATE names SET name='".$_POST['name']."', email='".$_POST['email']."', course='".$_POST['course']."' WHERE id='".$_POST['id']."'";

      //   if ($conn->query($sql) === TRUE) {
      //       // echo "Id number:".$_POST['id']." updated successfully";
      //       echo "Updated successfully";
      //     } else {
      //       echo "Error: " . $sql . "<br>" . $conn->error;
      //     }
      // }
             
               if(isset($_POST['delete'])){
            $sql = "DELETE FROM names WHERE id='".$_POST['id']."'";
            if ($conn->query($sql) === TRUE) {
                    echo "<h3>Deleted Successfully</h3>";
            } else {
                    echo "Error: " . $conn->error;
                }

            }

            ?>
            <a href="index.php" style="float:left">Fillup Form</a>
            <br><br><br><br><br>
        </div>
    
    </body>
</html>