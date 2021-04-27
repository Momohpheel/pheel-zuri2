
<?php

$conn = mysqli_connect("localhost", "root", "", "zuri");
if ($conn){
    session_start();
if ( isset($_POST['oldpassword']) && isset($_POST['oldpassword'])){
    if (!empty($_POST['newpassword']) && !empty($_POST['newpassword'])){

        $old_password = $_POST['oldpassword'];
        $new_password = $_POST['newpassword'];
        $username = $_SESSION['username'];
       
        $query = "UPDATE `user` SET `password` = '$new_password' WHERE `username` = '$username' AND `password` = '$old_password'";
        $query_run = mysqli_query($conn,$query);
        if ($query_run){
            echo "Password updated! <a href='home.php'>home page</a>";
        } else {
          echo "Error updating password";
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

<h5>Reset Password</h5>
    <form action="reset.php" method="POST">
        <label>Old Password<label>
        <input type="text" name="oldpassword">
        <br><br>
        <label>New Password<label>
        <input type="text" name="newpassword">
        <br><br>
        <input type="submit">
    </form>
    
</body>
</html>