<?php
    include("../db/config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:index.php");
    }
    include("header.php");
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM student WHERE id = '$id'";
        $run = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($run); 
    
        if(isset($_POST['btn'])){
            if(empty($_POST['name'])||empty($_POST['rollNumber'])||empty($_POST['totalMarks'])|| empty($_POST['obtainedMarks'])||empty($_POST['course'])){
                $err1 = "Enter All The Fields";
            }
            else{
                $percentage = (($_POST['obtainedMarks'])/$_POST['totalMarks'])*100;
                if($percentage>90){
                    $grade = 'A+';
                }else if($percentage>80){
                    $grade = 'A';
                }else if($percentage>70){
                    $grade= 'B';
                }else if($percentage>60){
                    $grade = 'C';
                }else if($percentage>50){
                    $grade = 'D';
                }else if($percentage>40){
                    $grade = 'E';
                }else{
                    $grade = 'FAIL';
                } 
                
                $name = $_POST["name"];
                $rollNumber = $_POST["rollNumber"];
                $totalMarks = $_POST["totalMarks"];
                $obtainedMarks = $_POST["obtainedMarks"];
                $course = $_POST["course"]; 
                $sql = "UPDATE student set name='$name', rollNumber='$rollNumber', totalMarks=$totalMarks, obtainedMarks=$obtainedMarks, percentage=$percentage, grade='$grade', course='$course' WHERE id=$id";
                $run = mysqli_query($con,$sql);
                if(!$run){
                    echo "Query not executing";
                }
                else{
                    echo "<script>window.location='allrecord.php'</script>";
                }
            }
        }
    }
else{
    echo "<script>window.location='allrecord.php'</script>";
}
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">
            <?php
                include("sidebar.php");
            ?>
            <div class="content">
               <form action="updaterecord.php" method="post">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $row['name']?>"></td>
                        </tr>
                        <tr>
                            <td>Roll No.</td>
                            <td><input type="text" name="rollNumber" value="<?php echo $row['rollNumber']?>"></td>
                        </tr>
                        <tr>
                            <td>Total Marks</td>
                            <td><input type="text" name="totalMarks"value="<?php echo $row['totalMarks']?>"></td>
                        </tr>
                        <tr>
                            <td>Marks Obtained</td>
                            <td><input type="text" name="obtainedMarks" value="<?php echo $row['obtainedMarks']?>"></td>
                        </tr>
                        <tr>
                            <td>Course</td>
                            <td>
                                <select name="course">
                                    <option><?php echo $row['course']?></option>
                                    <option>Data Science</option>
                                    <option>Web Dev</option>
                                    <option>Maths</option>
                                    <option>Physics</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="id" value="<?php echo $row['id']?>"></td>
                            <td><input type="submit" name="btn" class="btn" value="Update"></td>
                        </tr>
                    </table>
                </form> 
            </div>
        </div>
    </body>
</html>
<?php
    include("footer.php");
?>

