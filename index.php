<?php
    include("db/config.php");
    if(isset($_POST['btn'])){
        if(empty($_POST['rollNumber'])){
            $err1 = "..............*Fill the Roll Number..............";
        }
        else{
            $roll = $_POST['rollNumber'];
?>
<html>
    <head>
        <title>ADMIN BLOCK</title>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="admin/style.css">
    </head>
    <body>
    
         <div class="content">
              <table border=1px; class="table">
                    <tr>
                        <th>Name</th>
                        <th>RollNumber</th>
                        <th>TotalMarks</th>
                        <th>ObtainedMarks</th>
                        <th>Percentage</th>
                        <th>Grade</th>
                        <th>Course</th>
                    </tr>
                     <?php
                            $sql = "SELECT * FROM student WHERE rollNumber = '$roll'";
                            $run = mysqli_query($con,$sql);
                            if(mysqli_num_rows($run)>0){
                            $row=mysqli_fetch_assoc($run)
                     ?>
                     <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['rollNumber'];?></td>
                            <td><?php echo $row['totalMarks'];?></td>
                            <td><?php echo $row['obtainedMarks'];?></td>
                            <td><?php echo $row['percentage'];?></td>
                            <td><?php echo $row['grade'];?></td>
                            <td><?php echo $row['course'];?></td>
                     </tr>
                        <?php
                            }else{
                                echo "No Record Found";
                            }
                            }
                        }
                        ?>
                </table>
         </div>
         <div class="container">
          <div class="error">
      <?php
        if(isset($err1)){
          echo $err1;
        }
      ?>
    </div>
    <div class="login">
      <form action="" method="post" class="form-inline">
        <div class="form-group">
            <label>User:</label>
            <input type="text" name="rollNumber" class="form-control" placeholder="*rollNumber">
        </div>
        
              &nbsp<input type="submit" name="btn" value="See Result" class="btn btn-primary"/>
      </form>
    </div>
         </div>
        <a href="http://localhost/result/admin/">ADMIN</a>
    </body>
</html>