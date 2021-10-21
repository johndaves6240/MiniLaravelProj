<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	  <?php
          $conn= new mysqli('localhost','root','');
          $select= $conn->select_db('bago');


          if(!$select){
            $conn->query("CREATE DATABASE bago");

            $conn->select_db('bago');

            $conn->query("CREATE TABLE ngalan(
                  ngalan_id int AUTO_INCREMENT,
                  name varchar(24),
                 
                  PRIMARY KEY (ngalan_id)
            )");
             $conn->query("CREATE TABLE hotel(
                  hotel_id int AUTO_INCREMENT,
                  event_name varchar(50),
                  ngalan_id int NOT NULL,
                  PRIMARY KEY (hotel_id),
                 FOREIGN KEY (ngalan_id) REFERENCES ngalan(ngalan_id)
            )");
            }
            ?>


</body>
</html>