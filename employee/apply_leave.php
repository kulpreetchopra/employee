<?php

include('dbcon.php');

  if(isset($_POST['submit'])){
    echo$name= $_POST['name'];
    echo$email= $_POST['email'];
    echo$leave_from= $_POST['leave_from'];
    echo$leave_to= $_POST['leave_to'];
    echo$time= $_POST['time'];
    echo$c_leave= $_POST['c_leave'];
    echo$e_leave= $_POST['e_leave'];
    echo$s_leave= $_POST['s_leave'];
    echo$other= $_POST['other'];
    echo$reason= $_POST['reason'];
    echo$total=$c_leave+$e_leave+$s_leave+$other;

       echo$sql = "INSERT INTO apply_leave(leave_from,leave_to,e_leave,c_leave,s_leave,other,name,email,reason,status,time,total)VALUES('$leave_from','$leave_to','$e_leave','$c_leave','$s_leave','$other','$name','$email','$reason','pending','$time','$total');";
    }
       
  if(mysqli_query($con, $sql)){
    echo$_SESSION['succes']="Data Submitted Successfully!!";
    header("location:index.php");
  }else{
    // $_SESSION['error']="Data Submitted Unsuccessfully!!";
    header("location:index.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
