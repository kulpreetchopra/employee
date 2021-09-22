<?php

include('dbcon.php');

  if(isset($_POST['submit'])){

    echo$name= $_POST['name'];
    echo$email= $_POST['email'];
    
    $filename = $_FILES['file'] ['name'];
    $tempname = $_FILES['file'] ['tmp_name'];

    echo$image = "file/" .$filename;

    move_uploaded_file($tempname, $image);
    

    
    
}
echo$sql = "INSERT INTO resume(name,email,file)VALUES('$name','$email','$image');";

  
  if(mysqli_query($con, $sql)){
    // $_SESSION['succes']="Data Submitted Successfully!!";
    header("location:index.php");
  }else{
    // $_SESSION['error']="Data Submitted Unsuccessfully!!";
    header("location:index.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
