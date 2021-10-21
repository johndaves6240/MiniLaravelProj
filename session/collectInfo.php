<!DOCTYPE html>
<html>
    <head>
        <title>Input Page</title>
        <style>
            body{font-family: Tahoma,Ariel;background-color: #33ccff}
            h1 {text-align: center;}
            p {text-align: center;}
            div {text-align: center;background-color: #0080FF;margin-left: 50px;margin-right: 50px;}
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
                    Name: &nbsp <input type="text" name="fname"> <br> <br>
                    Email:&nbsp  <input type="email" name="emailAdd"><br><br>
                    Course: <input type="text" name="course"> <br> <br>
                </h3>
                <a href="clear.php">Clear Session</a>
            <input id="anchor" type="submit" name="submit">
                <a href="displayInfo.php">Collection</a>
            </form>
        </div>        
        <?php
            session_start();


            // if(isset($_SESSION['counter'])){
            //   $_SESSION['counter']+=1;
            // }else{
            //   $_SESSION['counter']=1;
            // }

            // $info_message="Counter: ". $_SESSION['counter']. "in this particular session";
          //   function removeItem(){

          //   unset($_SESSION['fname'][0]);  
          //   $arr2 = array_values($_SESSION['fname']); 
          // }

             function printFunction(){
                  for($x=$y=0;$x<sizeof($_SESSION['fname']);$x++){
                   
                        $y=$x+1;
                    echo"<p>Form {$y}</p>";
                    echo "Name:".$_SESSION['fname'][$x]."<br><br>";
                    echo "E-mail:".$_SESSION['emailAdd'][$x]. "<br><br>";
                    echo "Course:".$_SESSION['course'][$x]. "<br><br>";
                    // echo '<button onclick="removeItem()"">Remove</button>';
                    echo "<hr>";
                  }
                }

              // echo $info_message;

            if(isset($_SESSION['fname'], $_SESSION['course'],$_SESSION['emailAdd'])){
                if(isset($_POST['submit'])){
                    if (filter_var($_POST['emailAdd'], FILTER_VALIDATE_EMAIL)){
                        array_push ($_SESSION['fname'],$_POST['fname']);
                        array_push ( $_SESSION['course'],$_POST['course']);
                        array_push ( $_SESSION['emailAdd'],$_POST['emailAdd']);  
                    }
                  }
                }
            else{
                $_SESSION['fname'] = array();
                $_SESSION['course'] =array();
                $_SESSION['emailAdd'] = array();
            }



            // unset($_SESSION['fname'][2]);  
            // $arr2 = array_values($_SESSION['fname']); 
        


        ?>
    
    
</script>
    </body>
</html>
