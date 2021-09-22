<?php   
include('dbcon.php');


  if(isset($_POST['update'])){

    echo$status= $_POST['status'];
    echo$admin= $_POST['admin'];
    echo$id=$_GET['id'];
  
   echo$query ="UPDATE apply_leave SET status='$status',admin='$admin' WHERE id='$id'";

    echo$fire=mysqli_query($con, $query);
    if($fire){
    $_SESSION['succes']="Profile Updatted Successfully!!";
    header("location:index.php");
  }else{
    $_SESSION['error']="Profile Updatted Unsuccessfully!!";
    header("location:index.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }
}
?>