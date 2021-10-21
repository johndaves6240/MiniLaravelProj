<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		 div {text-align: center;background-color: #DDF4F5;margin-left: 50px;margin-right: 50px;}
	</style>
</head>
<body>
	<?php
	include 'connection.php';
	 if(isset($_POST['update'])){

                         $update = "SELECT * FROM names WHERE id='".$_POST['id']."'";
                         $updateQuery = $conn->query($update);
                         $updateResult = $updateQuery->fetch_assoc();

                   echo"<img src='{$updateResult['profile_picture']}' style='width:250px; height:250px;'>"."<br><br>";
                  echo '<div><form action="update.php" method="post" enctype="multipart/form-data">
                            <input type="text" value= "'.$updateResult["name"].'" name="name" placeholder="Name">
                            <input type="email" value= "'.$updateResult["email"].'" name="email" placeholder="Email">
                            <input type="text" value= "'.$updateResult["course"].'" name="course" placeholder="Course">
                            <input type="file" value= "'.$updateResult["profile_picture"].'" name="file" placeholder="Course">
                            <input type="hidden" name="id" value="'.$updateResult["id"].'">
                            <input type="submit" name="updateData"  value="Save">
                        </form></div>';
               //      echo '<form action="update.php" method="post" enctype="multipart/form-data">
               //      <img src='{$updateResult['profile_picture']}' style='width:250px; height:250px;'>"."<br><br>";
             		// <input type="text" value= "'.$updateResult["name"].'" name="name" placeholder="Name">
               //      <input type="email" value= "'.$updateResult["email"].'" name="email" placeholder="Email">
     
               //      <input type="text" value= "'.$updateResult["course"].'" name="course" placeholder="Course">';
               //       echo '<form action="update.php" method="POST"> 
               //           <input type="hidden" name="id" value="'.$updateResult["id"].'"> 
               //           <input type="submit" name="update" class="btn btn-success" value="Update">
                    
               //           </form>';
               //      echo "<hr>";
          }
 if(isset($_POST['updateData'])){

             // if(isset($_FILES['file'])&&($_FILES['file'])!=""){
                $files=$_FILES['file'];
                $name1=$files['name'];
                $type=$files['type'];
                $tmp=$files['tmp_name'];
                $error=$files['error'];
                $size=$files['size'];
                // $location='uploads/'.$name1;
                // unlink('uploads/'.$name1);
              move_uploaded_file($tmp, 'uploads/'.$name1);
      
             // }else{

             // }

            $sql = "UPDATE names SET name='".$_POST['name']."', email='".$_POST['email']."', course='".$_POST['course']."'WHERE id='".$_POST['id']."'";

        if ($conn->query($sql) === TRUE) {
            // echo "Id number:".$_POST['id']." updated successfully";
            echo "Updated successfully";
            echo "<a href='output.php'>Collection</a>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
            // header('Location: output.php');
      }



	?>

</body>
</html>