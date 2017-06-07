<?php

    include("../db/config.php");
    if(isset($_POST['btn2'])){
        if(empty($_POST['name'])||empty($_POST['password'])){
            $err1 = "Enter Both The Fields";
        }
        else{
            $sql = "select * from admin where name='$_POST[name]' AND password='$_POST[password]'" ; 
            $run = mysqli_query($con,$sql);
            if(mysqli_num_rows($run)>0){
                session_start();
                $_SESSION["login"]="1";
                $row = mysqli_fetch_assoc($run);
                echo "<script>window.location='addrecord.php'</script>";
            }
            else{
                $err2 = "Invalid Username/Password";
            }
        }
    }
?>
<html>
    <head>
        <title>singup page.</title>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="style.css">
    </head>
    <body>
     <div class="container">
    <div class="login">
      <form action="" method="post" class="form-inline">
        <div class="form-group">
            <label>User:</label>
            <input type="text" name="name" class="form-control" placeholder="*Admin">
        </div>
        <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" name="password" class="form-control" id="pwd" placeholder="*Password">
        </div>
              &nbsp<input type="submit" name="btn2" value="logIn" class="btn btn-primary"/>
      </form>
    </div>
    <div class="error">
      <?php
        if(isset($err2)){
          echo $err2;
        }
        else if(isset($err3)){
          echo $err3;
        }
      ?>
    </div>
    </div>
    </body>
</html>