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
            <form action="" method='POST'>
                <h3> 
                    Name: &nbsp <input type="text" name="name"> <br> <br>
                    Email:&nbsp  <input type="email" name="email"><br><br>
                    Course: <input type="text" name="course"> <br> <br>


                </h3>
           
            <input id="anchor" type="submit" name="submit">
                <a href="output.php">Collection</a>
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

        
            <a href="index.php" style="float:left">Fillup Form</a>
            <br><br><br><br><br>
        </div>
    </body>
</html>
