<?php


$conn = mysqli_connect("localhost", "root", "", "zuri");
if ($conn){
    session_start();
    if ( isset($_POST['username']) && isset($_POST['password'])){
        if (!empty($_POST['username']) && !empty($_POST['password'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT `name`,`username`,`password` FROM `user` WHERE `username` = '$username' AND `password` = '$password' ";
            $query_run = mysqli_query($conn,$query);
            if ($query_run->num_rows > 0){
                while($row = mysqli_fetch_assoc($query_run)) {
                     $_SESSION['name'] = $row['name'];
                     $_SESSION['username'] = $row['username'];
                  }
                Header("Location: home.php");
                
            } else {
              echo "Username or Password is Incorrect!";
            }
            
        }
    }
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Zuri Forms</title>
</head>
<body>

<h1>Zuri Forms</h1>

<h5>Login</h5>
    <form action="login.php" method="POST">
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