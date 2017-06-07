<?php
    include("../db/config.php");
    session_start();
    if(!isset($_SESSION["login"])){
        header("location:index.php");
    }
    include("header.php");  
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
                <table border=1px; class="table">
                    <tr>
                        <th>SNo.</th>
                        <th>Name</th>
                        <th>RollNumber</th>
                        <th>TotalMarks</th>
                        <th>ObtainedMarks</th>
                        <th>Percentage</th>
                        <th>Grade</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                     <?php
                            $sql = "SELECT * FROM student";
                            $run = mysqli_query($con,$sql);
                            if(mysqli_num_rows($run)>0){
                                $i=1;
                                while($row=mysqli_fetch_assoc($run)){
                     ?>
                     <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['rollNumber'];?></td>
                            <td><?php echo $row['totalMarks'];?></td>
                            <td><?php echo $row['obtainedMarks'];?></td>
                            <td><?php echo $row['percentage'];?></td>
                            <td><?php echo $row['grade'];?></td>
                            <td><?php echo $row['course'];?></td>
                            <td><a href="updaterecord.php?id=<?php echo $row['id']?>">Edit</a>
                                <a href="deleterecord.php?id=<?php echo $row['id']?>">Delete</a>
                         </td>
                        </tr>
                        <?php
                                }
                            }else{
                                echo "No Record Found";
                            }
                        ?>
                </table>
            </div>
        </div>
    </body>
</html>
<?php
    include("footer.php");
?>