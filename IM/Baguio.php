  <!DOCTYPE html>
<html>
    <head>
        <title>Get Page</title>
        <style>
            body{font-family: Tahoma,Ariel;background-color:#D2EDED}
            h1 {text-align: center;}
            p {text-align: center;}
            div {text-align: center;background-color:#DDF4F5;margin-left: 50px;margin-right: 50px;}
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

            #anchor{
                background-color: #000080;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
                margin:32px;
                display:inline-block
            }
        </style>
    </head>
    <body>
        <div>
            <br>
            <h1>Form Submission</h1>
            <form action="" method='POST'>
                <h3> 
                    Name: &nbsp <input type="text" name="name"> <br> <br>
                    Email:&nbsp  <input type="email" name="email"><br><br>
                    Course: <input type="text" name="course"> <br> <br>


                </h3>
           
            <input id="anchor" type="submit" name="submit">
              <!--   <a href="output.php">Collection</a> -->
            </form>
        </div>        
        <?php
          $conn= new mysqli('localhost','root','');
          $select= $conn->select_db('cis2104');


          if(!$select){
            $conn->query("CREATE DATABASE cis2104");

            $conn->select_db('cis2104');

            $conn->query("CREATE TABLE names(
                  id int(2) AUTO_INCREMENT,
                  name varchar(24),
                  email varchar(50),
                  course varchar(10),
                  PRIMARY KEY (id)
            )");
            }

            $conn= new mysqli('localhost','root','','cis2104');

            if(isset($_POST['submit'])){
                $name= $_POST['name'];
                $email= $_POST['email'];
                $course= $_POST['course'];


                $prepare= $conn->prepare("INSERT INTO names VALUES ('',?,?,?)");
                $prepare->bind_param('sss',$name,$email,$course);
                $prepare->execute();

            }


        ?>

        <div>
            <h1>Form Collection</h1>
            <?php
             $conn= new mysqli('localhost','root','','cis2104');
             if($conn-> connect_error){
             		die("Connection failed:". $conn-> connect_error);
             }
            

             $query = "SELECT * FROM names order by id asc";
            $result = $conn->query($query);

             $y=0;
             if($result->num_rows > 0){
             	echo "<hr>";
             	while($row =$result-> fetch_assoc()){
             		$y++;
             		echo"<h3>Form {$y}</h3>";
                    echo "ID:".$row['id']."<br><br>";
             		echo "Name:".$row['name']."<br><br>";
                    echo "E-mail:".$row['email']. "<br><br>";
                    echo "Course:".$row['course']. "<br><br>";
                   echo '<form action="Baguio.php" method="POST"> 
                    <input type="hidden" name="id" value="'.$row["id"].'"> 
                        <input type="submit" name="update" class="btn btn-success" value="Update">
                        <input type="submit" name="delete" class="btn btn-success" value="Delete">
                         </form>';
                    echo "<hr>";
             	}
             }

             if(isset($_POST['update'])){

                         $update = "SELECT * FROM names WHERE id='".$_POST['id']."'";
                         $updateQuery = $conn->query($update);
                         $updateResult = $updateQuery->fetch_assoc();

                  echo '<form action="Baguio.php" method="post">
                            <input type="text" value= "'.$updateResult["name"].'" name="name" placeholder="Name">
                            <input type="email" value= "'.$updateResult["email"].'" name="email" placeholder="Email">
                            <input type="text" value= "'.$updateResult["course"].'" name="course" placeholder="Course">
                            <input type="hidden" name="id" value="'.$updateResult["id"].'">
                            <input type="submit" name="updateData"  value="Save">
                        </form>';
          }
        
        if(isset($_POST['updateData'])){
            $sql = "UPDATE names SET name='".$_POST['name']."', email='".$_POST['email']."', course='".$_POST['course']."'WHERE id='".$_POST['id']."'";

        if ($conn->query($sql) === TRUE) {
            echo "Id number:".$_POST['id']." updated successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }


             if(isset($_POST['delete'])){
            $sql = "DELETE FROM names WHERE id='".$_POST['id']."'";
            if ($conn->query($sql) === TRUE) {
                    echo "Deleted successfully";
            } else {
                    echo "Error: " . $conn->error;
                }

            }
            $conn->close();
            ?>
         <!--    <a href="index.php" style="float:left">Fillup Form</a> -->
            <br><br><br><br><br>
        </div>
    </body>
</html>
