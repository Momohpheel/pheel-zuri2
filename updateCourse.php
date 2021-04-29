<?php


$conn = mysqli_connect("localhost", "root", "", "zuri");
if ($conn){
    session_start();
    if ( isset($_POST['course'])){
        if (!empty($_POST['course'])){

            $course = $_POST['course'];
            $username = $_SESSION['username'];
            $coursename = $_SESSION['coursename'];
            $addedby = $_SESSION['added_by'];
            echo $coursename;
            $query = "UPDATE  `course` SET `coursename` = '$course'  WHERE `coursename` = '$coursename' AND `added_by ` = $username ";

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

<h1>Zuri</h1>

<h5>Update Course</h5>
    <form action="updateCourse.php" method="POST">
        <label>Course Name<label>
        <input type="text" name="course">
        <br><br>
        <br><br>
        <input type="submit">
    </form>
   
</body>
</html>