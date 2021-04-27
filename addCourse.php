<?php


$conn = mysqli_connect("localhost", "root", "", "zuri");
if ($conn){
    session_start();
    if ( isset($_POST['course'])){
        if (!empty($_POST['course'])){

            $course = $_POST['course'];
            $username = $_SESSION['username'];

            $query = "INSERT INTO course (coursename, added_by) VALUES ('$course', '$username')";

            $query_run = mysqli_query($conn,$query);
            if ($query_run){
                Header("Location: home.php");
                
            } else {
              echo "Course was not added!";
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

<h5>Add Course</h5>
    <form action="addCourse.php" method="POST">
        <label>Course Name<label>
        <input type="text" name="course">
        <br><br>
        <br><br>
        <input type="submit">
    </form>
   
</body>
</html>