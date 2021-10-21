<!DOCTYPE html>
<html>
    <head>
        <title>Get Page</title>
        <style>
            body{font-family: Tahoma,Ariel;background-color:#D2EDED}
            h1 {text-align: center;}
            p {text-align: center;}
            div {text-align: center;background-color:#DDF4F5;margin-left: 50px;margin-right: 50px; margin-top: 80px;}
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
            <form action="" method='POST' enctype="multipart/form-data">
                <h3> 
                    Name:<input type="text" name="name"> <br> <br>
                    Email:<input type="email" name="email"><br><br>
                    Password:<input type="password" name="password"><br><br>
                    Course: <input type="text" name="course"> <br> <br>
                	Group ID:<select name="id">
  									<option>1</option>
 									 <option>2</option>
  									<option>3</option>
  									<option>4</option>
							</select>
                    Picture: <input type="file" name="file"> <br> <br>

                </h3>
           
            <input id="anchor" type="submit" name="submit">
                <a href="output.php">Collection</a>
            </form>
        </div>        
        <?php
          $conn= new mysqli('localhost','root','');
          $select= $conn->select_db('new_database');


          if(!$select){
            $conn->query("CREATE DATABASE new_database");

            $conn->select_db('new_database');

            $conn->query("CREATE TABLE names(
                  id int(2) AUTO_INCREMENT,
                  name varchar(24),
                  email varchar(50),
                  password varchar(50),
                  course varchar(10),
                  group_id int(4),
                  profile_picture varchar(100),
                  PRIMARY KEY (id)
            )");
            }

            $conn= new mysqli('localhost','root','','new_database');

            if(isset($_POST['submit'])){
                $name= $_POST['name'];
                $email= $_POST['email'];
                $password=$_POST['password'];
                $course= $_POST['course'];
                $files=$_FILES['file'];
                $name1=$files['name'];
                $type=$files['type'];
                $tmp=$files['tmp_name'];
                $error=$files['error'];
                $size=$files['size'];
                $location='uploads/'.$name1;
                $group_id=$_POST['id'];
                move_uploaded_file($tmp, $location);


                // $prepare= $conn->prepare("INSERT INTO names VALUES ('',?,?,?,?)");
                // $prepare->bind_param('ssss',$name,$email,$course,$location);
                // $prepare->execute();
                $sql="INSERT INTO names VALUES ('','$name','$email','$password','$course','$group_id','$location')";
                $conn->query($sql);

            }


        ?>
    </body>
</html>
