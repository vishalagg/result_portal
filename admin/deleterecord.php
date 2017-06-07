<?php
    include("../db/config.php");
    session_start();
    if(!isset($_SESSION["login"])){
       header("location:index.php");
    }
    include("header.php");
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM student WHERE id = '$id'";
        $run = mysqli_query($con,$sql);
        echo "<script>window.location='allrecord.php'</script>";
    }
else{
    echo "<script>window.location='allrecord.php'</script>";
}
?>