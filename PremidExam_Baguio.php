
<!DOCTYPE html>
<html>
<head>
	<title>Ticketing System</title>

	<style type="text/css">
		body{
			background-color: #B5CBCD;
		}
	</style>
</head>
<body>

	

	<div align="center">
		<form action="" method="POST">
			
			<h1>Book Ticket</h1>
			<h3>
				Passenger Name:<input type="text" name="name"> <br> <br>
                   Destination: <input type="text" name="destination"><br><br>
                  <label>Bus Number:</label>
 					 <select name="bus">
   							 <option value="1">1</option>
   							 <option value="2">2</option>
    						 <option value="3">3</option>
   							 <option value="4">4</option>
   							 <option value="5">5</option>
  					</select> <br><br>
  					
                   Book Ticket:<input type="text" name="ticket"> <br> <br> 
                   <input type="submit" name="Submit"><br><br>
                <!-- 	Passenger Ticket: <input type="text" name="course"> <br> <br>  -->
			</h3>
		</form>
		
			<hr>

			<?php
	
				session_start();

				$fare="";
			
				  function printFunction(){
				  	 echo "<hr>";
                  for($x=$y=0;$x<sizeof($_SESSION['name']);$x++){
                   
                        $y=$x+1;
                    if($_SESSION['bus'][$x]==1){
                    	echo "Bus 1"."<br><br>";
                    }else  if($_SESSION['bus'][$x]==2){
                    	echo "Bus 2"."<br><br>";
                    }else  if($_SESSION['bus'][$x]==3){
                    	echo "Bus 3"."<br><br>";
                    }else  if($_SESSION['bus'][$x]==4){
                    	echo "Bus 4"."<br><br>";
                    }else  if($_SESSION['bus'][$x]==5){
                    	echo "Bus 5"."<br><br>";
                    	}
                    echo "Name:".$_SESSION['name'][$x]."<br><br>";
                    echo "Destination:".$_SESSION['destination'][$x]. "<br><br>";
                    echo "Fare:"."Php".$_SESSION['fare'][$x]. "<br><br>";
                    echo "<hr>";
                  }
                }
                	$ticket=50;
			if (isset($_SESSION['name'],$_SESSION['destination'], $_SESSION['bus'], $_SESSION['fare'])) {
				if(isset($_POST['Submit'])){
						$fare=$_POST['ticket'];
						$fare*=50;
					    array_push ($_SESSION['name'],$_POST['name']);
                        array_push ( $_SESSION['destination'],$_POST['destination']);
                        array_push ( $_SESSION['bus'],$_POST['bus']); 
                        array_push ( $_SESSION['fare'],$fare); 
				}	
				printFunction();
				
			}else{
				$_SESSION['name'] = array();
                $_SESSION['destination'] =array();
                $_SESSION['bus'] = array();
                $_SESSION['fare']=array();
			}

		
			
			

		
		?>

		
	</div>
</body>
</html>