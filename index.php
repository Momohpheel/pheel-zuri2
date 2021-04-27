<?php
error_reporting(0);

$conn = mysqli_connect("localhost", "root", "", "zuri");
if ($conn){
    $db = mysqli_select_db($conn, "zuri");

    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){
        if (!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password'])){
    
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $check_query = "SELECT * FROM user WHERE `username` = '$username'";
            $query_run = mysqli_query($conn,$check_query);

            if ($query_run->num_rows > 0){
                echo "Username exists already, choose another!";
            }else{
                $query = "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')";

                if (mysqli_query($conn,$query)){
                    Header("Location: home.php");
                } else {
                  echo mysqli_error($conn);
                }
               
            }

            

        
        }
          
    }
}else{
    echo "No connection!";
}





?>

<!DOCTYPE html>
<html>
<head>
    <title>Zuri Forms</title>
</head>
<body>

<h1>Zuri Forms</h1>

<h5>Register</h5>
    <form action="index.php" method="POST">
        <label>Name<label>
        <input type="text" name="name">
        <br><br>
        <label>Username<label>
        <input type="text" name="username">
        <br><br>
        <label>Password<label>
        <input type="password" name="password">
        <br><br>
        <input type="submit">
    </form>

</body>
</html>