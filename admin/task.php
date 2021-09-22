<?php

include('dbcon.php');

  if(isset($_POST['submit'])){
    $emp_list= $_POST['emp_id'];
    print_r($emp_list);
    // echo$emp_id= $_POST['emp_id'];
    $message= $_POST['message'];
    $admin= $_POST['admin'];
    $time= $_POST['time'];

    foreach ($emp_list as $e) {
      $q = "SELECT * FROM `employee` WHERE  `id`='$e'";
       $query = mysqli_query($con, $q);
       $result = mysqli_fetch_array($query);
       $name= $result['name'];
       $email= $result['email'];
       echo$sql = "INSERT INTO task(emp_id,name,email,message,time,admin,status)VALUES('$e','$name','$email','$message','$time','$admin','unseen');";
       echo$done=mysqli_query($con, $sql);
    }
       
}
  if($done){
    // $_SESSION['succes']="Data Submitted Successfully!!";
    header("location:index.php");
  }else{
    // $_SESSION['error']="Data Submitted Unsuccessfully!!";
    header("location:index.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
