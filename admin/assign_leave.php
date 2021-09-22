<?php

include('dbcon.php');

  if(isset($_POST['submit'])){
    $assigned_list= $_POST['assign_to'];
    print_r($assigned_list);
    // echo$emp_id= $_POST['emp_id'];
    echo$valid_from= $_POST['valid_from'];
    echo$valid_to= $_POST['valid_to'];
    echo$time= $_POST['time'];
    echo$c_leave= $_POST['c_leave'];
    echo$e_leave= $_POST['e_leave'];
    echo$s_leave= $_POST['s_leave'];
    echo$assigned_by= $_POST['assign_by'];

    foreach ($assigned_list as $e) {
      $q = "SELECT * FROM `employee` WHERE  `id`='$e'";
       $query = mysqli_query($con, $q);
       $result = mysqli_fetch_array($query);
       echo$name= $result['name'];
       echo$email= $result['email'];
       echo$sql = "INSERT INTO assign_leave(valid_from,valid_to,e_leave,c_leave,s_leave,assign_by,assign_to,email,time)VALUES('$valid_from','$valid_to','$e_leave','$c_leave','$s_leave','$assigned_by','$name','$email','$time');";
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
