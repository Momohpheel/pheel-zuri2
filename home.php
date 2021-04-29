<?php
//error_reporting(0);
//get session

$conn = mysqli_connect("localhost", "root", "", "zuri");
if ($conn){
session_start();

    if (isset($_POST['logout'])){
        session_destroy();
        Header("Location:login.php");
    }

    if (isset($_POST['update'])){
        $_SESSION['coursename'] = $_GET['coursename'];
        $_SESSION['added_by'] = $_GET['added_by'];
        Header("Location:updateCourse.php");
       // echo  $_POST['coursename'];
    }

    if (isset($_POST['delete'])){
        $coursename= $_POST['coursename'];
        $user = $_POST['added_by'];

        
        $query = "DELETE FROM `course` WHERE `coursename` = '$coursename' AND `added_by` = '$user'";
        $query_run = mysqli_query($conn,$query);
        if ($query_run){
            Header("Location: home.php");
            
        } else {
          echo "Course was not deleted!";
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

    <h1>Zuri Home Page</h1>

    <h3>Home Page</h5>
        <h1>You're welcome, <?php echo $_SESSION['name']; ?> </h1>

        <table>
            <tr>
                <th>Course</th>
                <th>Added by</th>
                <th></th>
                <th></th>
            </tr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "zuri");
    if ($conn){
        $query = "SELECT * FROM `course` ";
        $query_run = mysqli_query($conn,$query);
        if ($query_run->num_rows > 0){
            while ($row = mysqli_fetch_assoc($query_run)){
                echo "<tr>
                        <td>". $row['coursename']."</td>

                        <td>".$row['added_by']."</td>
                        
                        <td>
                        
                        <form action='home.php' method='POST'>
                            <input type='text' name='coursename' style='display:none;' value=".$row['coursename'].">
                            <input type='text' name='added_by' style='display:none;' value=".$row['added_by'].">
                            <input type='submit' name='update' value='update'>
                        </form>
                    <td>

                    <td>
                        <form action='home.php' method='POST'>
                            <input type='' name='coursename' style='display:none;' value=".$row['coursename'].">
                            <input type='' name='added_by' style='display:none;' value=".$row['added_by'].">
                            <input type='submit' name='delete' value='delete'>
                        </form>
                    </td>
                </tr>";
            }
    }
    }
    ?>
       
    </table>

   <br><br><br>
   <a href="addCourse.php">
        <button>Add Course</button>
    </a>
    <br><br><br>
    <form action="home.php" method="POST">
        <input type="submit" name="logout" value="logout">
    
    </form>
    <a href="reset.php">
        reset password
    </a>
</body>
</html>