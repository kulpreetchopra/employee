<?php

include('dbcon.php');

  if(isset($_POST['submit'])){

    echo$name= $_POST['name'];
    echo$email= $_POST['email'];
    echo$mobile= $_POST['mobile'];
    echo$address= $_POST['address'];
    echo$gender= $_POST['gender'];
    echo$department =$_POST['department'];
    echo$password =$_POST['password'];
    echo$role =$_POST['role'];

    $filename = $_FILES['image'] ['name'];
    $tempname = $_FILES['image'] ['tmp_name'];

    $image = "../image/" .$filename;

    move_uploaded_file($tempname, $image);
    echo "<img src='$image' height='100' width='100' />";

    
    
}
$sql = "INSERT INTO employee(name,email,mobile,address,gender,department,password,forgott_pass,image,role)VALUES('$name','$email','$mobile','$address','$gender','$department','$password','green','$image','$role');";

  
  if(mysqli_query($con, $sql)){
    // $_SESSION['succes']="Data Submitted Successfully!!";
    header("location:index.php");
  }else{
    // $_SESSION['error']="Data Submitted Unsuccessfully!!";
    header("location:index.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
