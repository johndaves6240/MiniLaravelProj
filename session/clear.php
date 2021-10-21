<?php
    session_start();
    
   session_destroy();
?>

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
            <br>
            <h1>Session Cleared!!!</h1>
            <a href="collectInfo.php">Submit Form</a>
            <br><br>
        </div>
    
    </body>
</html>