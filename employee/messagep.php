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
$m_id =$_GET['id'];
$query ="select * From task where id=$m_id";
$fire =mysqli_query($con,$query);

//if($fire)echo "we got the data.";
$user = mysqli_fetch_assoc($fire);
$user['admin'];

}
?>
<div class="card container-fluid" style="background-color:transparent!important;">
  <h5 class="text-center">Task <i class="fas fa-comments"></i> / <a style="color:#007bff!important;" href="index.php"><i class="fas fa-eye"></i></a></h5>
                      <div class="container-fluid">
                        <p><?php date_default_timezone_set("Asia/Kolkata");?>
                          <i class="fas fa-history"></i><?php echo " " . date("Y-m-d");echo " " . date("h:i A");?></p>
                        <div class="row">
                          <div class="col-md-5 scrollable" style="border:2px solid white;">
                            <p><?php echo$user['message'];?></p>
                          </div>
                          <br>
                          <div class="col-md-7" style="border:2px solid white;">
                            <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="m_id" value="<?php echo$m_id; ?>">
                            <input type="hidden" name="e_id" value="<?php echo$result['id']; ?>">
                            <input type="hidden" name="admin" value="<?php echo$result['name'];?>">
                            <input type="hidden" name="time" value="<?php echo " " . date("Y-m-d");echo " " . date("h:i A");?>">
                            <textarea style="margin-top:12px;" name="reply" class="form-control"rows="4" placeholder="&#129488 Reply For Task To Admin...."></textarea>
                            <button style="margin-top:12px;margin-bottom:12px;" type="submit" name="submit" class="btn btn-success btn-block">REPLY TASK</button>
                            </form>
                            <!-- update -->
<?php   
include('dbcon.php');


  if(isset($_POST['submit'])){

    $e_id= $_POST['e_id'];
    $reply= $_POST['reply'];
    $m_id= $_POST['m_id'];
    $admin= $_POST['admin'];
    $time= $_POST['time'];

   $q ="INSERT INTO task_reply(e_id,reply,m_id,admin,time)VALUES('$e_id','$reply','$m_id','$admin','$time');";

   $fire =mysqli_query($con, $q);
    if($fire){
    $_SESSION['succes']="Profile Updatted Successfully!!";
    // header("location:../");
  }else{
    // header("location:message.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }
}
?>
                          </div>
                      <br>
                      <?php
       include ('dbcon.php');
       $editid=$result['id'];
       $q2 = "select * from task_reply WHERE  `m_id`='$m_id;' order by r_id desc";
       $query2 = mysqli_query($con, $q2);
  ?>
  <div class="table-responsive">
  <table style="color:white;" class="table">
                  <thead>                  
                    <tr>
                      <th>Id</th>
                      <th>Emp_Id</th>
                      <th>Name</th>
                      <th>Reply</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $i=1;
                      while ($result2 = mysqli_fetch_array($query2)) {
                      ?>
                        <td><?php echo$i;?></td>
                        <?php $i++;?>
                        <td><?php echo$result2['e_id']?></td>
                        <td><?php echo$result2['admin']?></td>
                        <td><?php echo$result2['reply']?></td>
                        <td><?php echo$result2['time']?></td>
                        <td class="text-center">
                          <a href="replydelet.php?r_id=<?php echo $result2['r_id']?>&id=<?php echo $result2['m_id']?>"><i class="fas fa-trash"></i>&nbsp;</a>
        </td>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
          </div>