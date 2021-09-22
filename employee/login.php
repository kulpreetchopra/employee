<?php include("session.php");?>
<?php
session_start();
include ('dbcon.php');
if (isset($_POST['submit']))
{
   echo$email = $_POST['email']; 
   echo$pwd =  $_POST['password']; 

  $query = "SELECT * FROM  employee WHERE email = '$email' && password= '$pwd'";
  $data = mysqli_query($con, $query);
  $result = mysqli_fetch_array($data);
  $total =mysqli_num_rows($data);
       
if($total==1){
   echo$_SESSION['email'] =$email;
   $_SESSION['password'] =$pwd;
  if($result['role']=='admin'){
    header('location:index.php');
  }
  if($result['role']=='employee'){
    header('location:../employee/index.php');
  }
}
  else{

  header('location:../index.php');
  }

}
?>