<?php
error_reporting(0);
?>
<?php include("session.php");?>
<?php

       include ('dbcon.php');
       $user=$_SESSION['email'];
       $q = "SELECT * FROM `employee` WHERE  `email`='$user'";
       $query = mysqli_query($con, $q);
       $result = mysqli_fetch_array($query);
    //    echo $result['image'];
       
  ?>
  <?php
include ('dbcon.php');

if (isset($_GET['id']))
{
$id =$_GET['id'];
$query ="select * From task where id=$id";
$fire =mysqli_query($con,$query);

//if($fire)echo "we got the data.";
$user = mysqli_fetch_assoc($fire);
$user['name'];

}
?>
<!-- update -->
<?php   
include('dbcon.php');


  if(isset($_POST['update'])){

    $emp_id= $_POST['emp_id'];

       $q5 = "SELECT * FROM `employee` WHERE  `id`='$emp_id'";
       $query5 = mysqli_query($con, $q5);
       $result5 = mysqli_fetch_array($query5);
       $name= $result5['name'];
       $email= $result5['email'];
       $admin= $_POST['admin'];
       $time= $_POST['time'];
       $message= $_POST['message'];

   $qs ="UPDATE task SET name='$name',email='$email',emp_id='$emp_id',message='$message',admin='$admin',time='$time',message='$message' WHERE id=$id";

   $fire =mysqli_query($con, $qs);
  //   if($fire)echo "data updated successfully.";
  //   if($fire){
  //   $_SESSION['succes']="Profile Updatted Successfully!!";
  //   header("location:viewtask.php");
  // }else{
  //   $_SESSION['error']="Profile Updatted Unsuccessfully!!";
  //   header("location:viewtask.php");
  //   // echo "<div class='alert alert-danger'>Query Failed.</div>";
  // }
}
?>
<div class="card container-fluid" style="background-color:transparent!important;">
  <h5 class="text-center">Task <i class="fas fa-user-edit"></i> / <a style="color:#007bff!important;" href="viewtask.php"><i class="fas fa-eye"></i></a></h5>
                    <form method="post" enctype="multipart/form-data">
                      <div class="container-fluid">
                        <p><?php date_default_timezone_set("Asia/Kolkata");?>
                          <i class="fas fa-history"></i><?php echo " " . date("Y-m-d");echo " " . date("h:i A");?></p>
                        <div class="row">
                          <div class="col-md-5 scrollable" style="border:2px solid white;">
                            <?php
       include ('dbcon.php');
       $q3 = "select * from employee where role='employee' order by id desc"; 
       $query3 = mysqli_query($con, $q3);
       while ($result3 = mysqli_fetch_array($query3)) {        
     ?>
                            <input type="checkbox" name="emp_id" value="<?php echo$result3['id'];?>"<?php echo ($user["emp_id"]==$result3['id'])?'checked':'' ?>>
                            <label class="mob"><i class="fas fa-user"></i> <?php echo$result3['name'];?>(<?php echo$result3['department'];?>)</label>
                            <label class="web"><i class="fas fa-user"></i> <?php echo$result3['name'];?> <?php 
                            if($result3['department']=='frontend'){
                              ?>
                              <i class="fas fa-paint-roller"></i>
                            <?php
                            }
                            if($result3['department']=='backend') {
                            ?>
                            <i class="fas fa-file-code"></i>
                            <?php
                            }
                            if($result3['department']=='nontech') {
                            ?>
                            <i class="fas fa-dove"></i>
                            <?php
                            }
                            if($result3['department']=='pramotion') {
                            ?>
                            <i class="fab fa-instagram"></i>
                            <?php
                            }
                            ?>
                            </label>
                            <br>
                            <input type="hidden" name="admin" value="<?php echo$result['name'];?>">
                            <input type="hidden" name="time" value="<?php echo " " . date("Y-m-d");echo " " . date("h:i A");?>">
                          <?php
                          }
                          ?>
                          </div>
                          <br>
                          <div class="col-md-7" style="border:2px solid white;">
                            <textarea style="margin-top:12px;" name="message" class="form-control"rows="4" placeholder="&#129488 Assign Task To Employees...."><?php echo $user['message'] ?></textarea>
                            <button style="margin-top:12px;margin-bottom:12px;" type="submit" name="update" class="btn btn-success btn-block">UPDATE TASK</button>
                          </div>
                        </div>
                        
                      </div>
                    </form>
          </div>
                