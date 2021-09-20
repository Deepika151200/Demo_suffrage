<!DOCTYPE html>
<html>
  
<head>
    <title>Candidate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "suffrage");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $email = $_REQUEST['email'];
        $aadhar = $_REQUEST['aadhar'];
        $password = $_REQUEST['password'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO  user_details VALUES ('$email','$aadhar','$password')";
          
        if(mysqli_query($conn, $sql)){
            header("Location:candidate1.html");
        } else{
            echo "$sql. " 
                . mysqli_error($conn);
        }

          
        // Close connection
        mysqli_close($conn);
        
        ?>
    </center>
    
</body>
  
</html>