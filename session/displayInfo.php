<!DOCTYPE html>
<html>
    <head>
        <title>Output Page</title>
        <style>
            body{font-family: Tahoma,Ariel;background-color: #33ccff;}
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
        </style>
    </head>
    <body>
        <div>
            <h1>Session Collection</h1>
            <?php
                session_start(); 
                echo sizeof($_SESSION['fname']);
                printFunction();

                function printFunction(){
                  for($x=$y=0;$x<sizeof($_SESSION['fname']);$x++){
                   
                        $y=$x+1;
                    echo"<p>Form {$y}</p>";
                    echo "Name:".$_SESSION['fname'][$x]."<br><br>";
                    echo "E-mail:".$_SESSION['emailAdd'][$x]. "<br><br>";
                    echo "Course:".$_SESSION['course'][$x]. "<br><br>";
           
                    echo "<hr>";
                  }
                }

            
                // unset($_SESSION['fname'][1]);
                // unset($_SESSION['emailAdd'][1]);
                // unset($_SESSION['course'][1]);
            ?>
            <a href="collectInfo.php" style="float:left">Submit Form</a>
            <a href="clear.php" style="float:right">Clear Session</a>
            <br><br><br><br><br>
        </div>
    
    </body>
</html>