<?php   
include('dbcon.php');


  if(isset($_POST['update'])){

    echo$status= $_POST['status'];
    echo$message= $_POST['message'];
    echo$id=$_GET['id'];
  
   echo$query ="UPDATE task SET status='$status' WHERE message='$message' and emp_id='$id'";

    echo$fire=mysqli_query($con, $query);
    if($fire)echo "data updated successfully.";
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