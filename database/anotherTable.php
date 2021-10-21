<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <form action="" method='POST'>
                <h3> 
                    Group ID:<select name="id">
  									<option>1</option>
 									 <option>2</option>
  									<option>3</option>
  									<option>4</option>
							</select><br><br>
                    Group Name:<input type="text" name="group_name"><br><br>
                    <input type="submit" name="submit">
               
                </h3>
                <!-- <a href="output.php">Collection</a> -->
            </form>
        </div>        
        <?php
        	$conn= new mysqli('localhost','root','');
           $select= $conn->select_db('new_database');

            $conn->query("CREATE TABLE group_Table(
                group_id int(2),
                group_name varchar(100)
            )");
            

            if(isset($_POST['submit'])){
                $id= $_POST['id'];
                $group_name= $_POST['group_name'];
            


                // $prepare= $conn->prepare("INSERT INTO names VALUES ('',?,?,?,?)");
                // $prepare->bind_param('ssss',$name,$email,$course,$location);
                // $prepare->execute();
                $sql="INSERT INTO group_Table VALUES ('$id','$group_name')";
                $conn->query($sql);

            }


        ?>

</body>
</html>