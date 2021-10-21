<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>   
        <?php
        	include 'connection.php';
         $result=$conn->query("SELECT * FROM names INNER JOIN group_table ON names.group_id= group_table.group_id");

        while($row= $result->fetch_assoc()){
            echo $row['name']." Group: ".$row['group_name']."<br><br>";
        }


        ?>

</body>
</html>