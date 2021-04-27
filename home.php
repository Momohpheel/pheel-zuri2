<?php

//get session
session_start();

if (isset($_POST['logout'])){
    session_destroy();
    Header("Location:login.php");
}





?>

<!DOCTYPE html>
<html>
<head>
    <title>Zuri Forms</title>
</head>
<body>

<h1>Zuri Home Page</h1>

<h3>Home Page</h5>
    <h1>You're welcome, <?php echo $_SESSION['name']; ?> </h1>
    <form action="home.php" method="POST">
        <input type="submit" name="logout" value="logout">
    </form>
    <a href="reset.php">
        reset password
    </a>
</body>
</html>