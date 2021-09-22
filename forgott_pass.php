<?php include("session.php");?>
<?php

include('dbcon.php');

  if(isset($_POST['update'])){

    echo$name =$_POST['name'];
    echo$email =$_POST['email'];

}
$sql = "UPDATE employee SET forgott_pass='red' WHERE name='$name' or email='$email'";
  
  if(mysqli_query($con, $sql)){
    header("location:index.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
