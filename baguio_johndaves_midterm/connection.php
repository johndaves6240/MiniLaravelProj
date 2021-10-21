<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
            $conn= new mysqli('localhost','root','');
          $select= $conn->select_db('event_booking');


          if(!$select){
            $conn->query("CREATE DATABASE event_booking");

            $conn->select_db('event_booking');

            $conn->query("CREATE TABLE user_detail(
                  user_id int(2) AUTO_INCREMENT,
                  username varchar(50),
                  password varchar(50),
                  name varchar(50),
                  email varchar(10),
                  user_type ENUM('Admin','User'),
                  PRIMARY KEY (user_id)
            )");
            $conn->query("CREATE TABLE events_table(
                  event_id int(2) AUTO_INCREMENT,
                  event_name varchar(50),
                  event_image varchar(50),
                  PRIMARY KEY (event_id)
            )");
            $conn->query("CREATE TABLE bookings_table(
                  booking_id int(2) AUTO_INCREMENT,
                  event_id varchar(50),
                  user_id varchar(50),
                  PRIMARY KEY (booking_id)
            )");

            $sql="INSERT INTO `user_detail`(`user_id`, `username`, `password`, `name`, `email`, `user_type`) VALUES ('','admin','admin123','administrator','admin@gmail.com','admin')";
             $conn->query($sql);
            }
	?>

</body>
</html>