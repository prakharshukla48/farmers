<?php 
$flagged = false;        
                $server = "localhost";
                $username = "root";
                $password = "";
                $con = mysqli_connect($server, $username, $password);

                if (!$con){
                die("connection to this database failed due to" .
                mysqli_connect_error());
                }
                //echo "2";
                $Name = $_GET['Name'];
                $Age = $_GET['Age'];
                $State = $_GET['State'];
                $Income = $_GET['Income'];
                $other = $_GET['other'];

                $sql = "INSERT INTO `farmers_details`.`farmer` (`Name`, `Age`, `State`, `Income`, `other` ) VALUES 
                ('$Name', '$Age', '$State', '$Income', '$other');";
                //echo $sql;
                //echo "3";
                if($con->query($sql)== true){
                    //echo"successfully inserted";
                    $flagged = true;
                }
                else{
                    echo "ERROR $sql <br> $con->error";
                }

                $con->close();
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Rights</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img class = "bg" src="bg.jpg">
    <div class="container">
        <h1>Farmer Rights</h1>
        <p>Are you a proud farmer? Fill the details : No, But wanna help them</p>
        <?php
        if($flagged == true){
        echo "<p>Thank You ! Your Form has been submitted</p>" ;}
        else{
            echo "<p>There was an error</p>" ; 
        }
        ?>
        <form action="index.php">
            <input type="text" name = "Name" id = "Name" placeholder="Enter Your Name"><br>
            <input type="number" name = "Age" id = "Age" placeholder="Enter Your Age"><br>
            <input type="text" name = "State" id = "State" placeholder="Enter Your State"><br>
            <input type="income" name = "Income" id = "Income" placeholder="Enter Your Monthly Income"><br>
            <textarea name = "other" id = "other" placeholder="Add More Info"></textarea><br>
            <button type="submit" id="btn">Submit</button><br>
   
        </form>
    </div> 
<script src="index.js"></script>
</body>
</html>
