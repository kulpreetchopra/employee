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
<div class="card container-fluid" style="padding-right: 0px;
    padding-left: 0px;background-color:transparent!important;">
<div class="container-fluid">
    <div class="row my-2">
        <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item" class="m">
                    <a style="background-color:transparent!important;" href="" data-target="#profile" data-toggle="tab" class="nav-link active"><i class="fas fa-user"></i><b> Profile</b></a>
                </li>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#viewtask" data-toggle="tab" class="nav-link"><i class="fas fa-eye"></i><b> Task</b></a>
                </li>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#leave" data-toggle="tab" class="nav-link"><i class="fas fa-user-edit"></i><b> Leave</b></a>
                </li>
                 <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#viewleave" data-toggle="tab" class="nav-link"><i class="fas fa-eye"></i><b> Leave</b></a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                                <div class="col-md-5">
                                  <p><a class="text-left" href="empedit.php?id=<?php echo $result['id']?>"><i style="color:blue!important;" class="fas fa-edit"></i>&nbsp;<b>Edit Profile</b></a></p>
                                   <p><b>Name: </b><span><?php echo$result['name']?></span></p>
                                   <p><b>Email: </b><span><?php echo$result['email']?></span></p>
                                   <p><b>Mobile: </b><span><?php echo$result['mobile']?></span></p> 
                                   <p><b>Address: </b><span><?php echo$result['address']?></span></p> 
                                </div>
                                <div class="col-md-4">
                                  <br class="mob">
                                  <br class="mob">
                                    <p><b>Gender: </b><span><?php echo$result['gender']?></span></p>
                                    <p><b>Password: </b><span><?php echo$result['password']?></span></p>
                                    <p><b>Department: </b><span></i><?php echo$result['department']?></span></p>
                                    <p><b>Role: </b><span><?php echo$result['role']?></span></p> 
                                </div>
                                <div class="col-md-3 text-center">
                                  <img src="<?php echo $result['image']?>" style="height: 195px;width: 195px;border-radius: 50%;" class="mob" alt="AdminLTE Logo">
                                  <img src="<?php echo $result['image']?>" style="height: 260px;width: 270px;border-radius: 50%;" class="web" alt="AdminLTE Logo">
                                  <form class="md-form" action="imageupdate.php" method="post" enctype="multipart/form-data">
                                    <div class="file-field">
                                      <div class="d-flex justify-content-center">
                                        <div class="btn btn-mdb-color btn-rounded float-left">
                                          <input type="hidden" name="id" value="<?php echo $result['id']?>">  
                                          <input style="color:white;" type="file" name="image">
                                          <br><input type="submit" name="update" value="update">
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- tasks view -->
                <div class="tab-pane" id="viewtask">
                  <?php
       include ('dbcon.php');
       $id=$result['id'];
       $q3 = "select * from task where emp_id=$id";
       $query3 = mysqli_query($con, $q3);
  ?>
  <i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>Unseen,<i class="fas fa-stop-circle" style="color:orange;font-size: 20px;"></i>Running,<i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>Completed,<i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>Uncompleted.
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>No.</th>
                      <th>Admin</th>
                      <th>Task</th>
                      <th class="text-center">Status</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $i=1;
                      while ($result3 = mysqli_fetch_array($query3)) {
                      ?>
                        <td><?php echo$i;?></td>
                        <?php $i++;?>
                        <td><?php echo$result3['admin']?></td>
                        <td><?php echo substr($result3['message'],0,20);echo"..."?></td>
                        <td class="text-center"><?php
                        if($result3['status']=='green'){
                         ?>
                         <i class="fas fa-check-circle" style="color:green;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result3['status']=='orange'){
                         ?>
                         <i class="fas fa-stop-circle" style="color:orange;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result3['status']=='red'){
                         ?>
                         <i class="fas fa-times-circle" style="color:red;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result3['status']=='unseen'){
                         ?>
                         <i class="fas fa-spinner" style="color:blue;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         ?>
                         <form action="statusupdate.php?id=<?php echo$result['id'] ?>" method="post" enctype="multipart/form-data"> 
                         <input type="hidden" name="message" value="<?php echo$result3['message']?>"> 
        <input type="radio" value="red"<?php echo ($result3["status"]=='red')?'checked':'' ?> name="status"><i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>
        <input type="radio" value="green"<?php echo ($result3["status"]=='green')?'checked':'' ?> name="status"><i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>
        <input type="radio" value="orange"<?php echo ($result3["status"]=='orange')?'checked':'' ?> name="status"><i class="fas fa-stop-circle" style="color:orange;font-size: 20px;"></i>
        <input type="radio" value="unseen"<?php echo ($result3["status"]=='unseen')?'checked':'' ?> name="status"><i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>
        <br><input type="submit" name="update" value="update">
        </form>
                       </td>
                        <td><?php echo$result3['time']?></td>
                        <td class="text-center"><a href="message.php?id=<?php echo $result3['id']?>"><i class="fas fa-comments"></i>&nbsp;</a></td>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
                </div>
                <!-- leave view -->
                <div class="tab-pane" id="viewleave">
                  <?php
       include ('dbcon.php');
       $name=$result['name'];
       $q7 = "select * from apply_leave where name='$name' order by id desc";
       $query7 = mysqli_query($con, $q7);
  ?>
  <i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>Pending,<i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>Approved,<i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>Rejected.
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>No.</th>
                      <th>CASUAL_LEAVE</th>
                      <th>EARNED_LEAVE</th>
                      <th>SICK_LEAVE</th>
                      <th>OTHER</th>
                      <th>Leave_From</th>
                      <th>Leave_To</th>
                      <th>Reason</th>
                      <th>total</th>
                      <th class="text-center">Status</th>
                      <th>Admin</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $i=1;
                      while ($result7 = mysqli_fetch_array($query7)) {
                      ?>
                        <td><?php echo$i;?></td>
                        <?php $i++;?>
                        <td><?php echo$result7['c_leave']?></td>
                        <td><?php echo$result7['e_leave']?></td>
                        <td><?php echo$result7['s_leave']?></td>
                        <td><?php echo$result7['other']?></td>
                        <td><?php echo$result7['leave_from']?></td>
                        <td><?php echo$result7['leave_to']?></td>
                        <td><?php echo substr($result7['reason'],0,15);echo"..."?></td>
                        <td><?php echo$result7['total']?></td>
                        <td class="text-center"><?php
                        if($result7['status']=='approved'){
                         ?>
                         <i class="fas fa-check-circle" style="color:green;font-size: 30px;"></i>
                        <?php  # code...
                         }  
                         if($result7['status']=='rejected'){
                         ?>
                         <i class="fas fa-times-circle" style="color:red;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result7['status']=='pending'){
                         ?>
                         <i class="fas fa-spinner" style="color:blue;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         ?>
                       </td>
                       <td><?php echo$result7['admin']?></td>
                        <td><?php echo$result7['time']?></td>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
                </div>
                <!-- tasks view -->
                <div class="tab-pane" id="leave">
                  <form action="apply_leave.php" method="post" enctype="multipart/form-data">
                  <?php
       include ('dbcon.php');
       $name=$result['name'];
       $q4 = "select * from assign_leave where assign_to='$name'";
       $query4 = mysqli_query($con, $q4);
  ?>
  <i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>Pending,<i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>Approved,<i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>Rejected.
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>No.</th>
                      <th>CASUAL_LEAVE</th>
                      <th>EARNED_LEAVE</th>
                      <th>SICK_LEAVE</th>
                      <th>Valid_from</th>
                      <th>Valid_to</th>
                      <th>Admin</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $i=1;
                      while ($result4 = mysqli_fetch_array($query4)) {
                      ?>
                        <td><?php echo$i;?></td>
                        <?php $i++;?>
                        <td><?php echo $result4['c_leave']?></td>
                        <td><?php echo $result4['e_leave']?></td>
                        <td><?php echo $result4['s_leave']?></td>
                        <td><?php echo $result4['valid_from']?></td>
                        <td><?php echo $result4['valid_to']?></td>
                        <td><?php echo$result4['assign_by']?></td>
                        <td><?php echo$result4['time']?></td>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
              <div class="col-md-12" style="border:2px solid white;">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-lg-4 col-form-label form-control-label">Casual Leave:</label>
                                  <div class="col-lg-8">
                                      <?php
                                      include ('dbcon.php');
       $name=$result['name'];
       $q5 = "select * from assign_leave where assign_to='$name'";
       $query5 = mysqli_query($con, $q5);
       $result5 = mysqli_fetch_array($query5);
       date_default_timezone_set("Asia/Kolkata");
       " " . date("Y-m-d");" " . date("h:i A");
                                      $i=0;
                                      $r=$result5['c_leave'];
                                     ?>
                                     <select name="c_leave" class="form-control">
                                      <?php
                                      while($i<=$r){
                                      ?>
      <option value="<?php echo$i ?>"><?php echo$i ?></option>
      <?php
      $i++;
      }
      ?>
      </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-4 col-form-label form-control-label">Earned Leave:</label>
                                  <div class="col-lg-8">
                                    <?php
                                      $e=$result5['e_leave'];
                                     ?>
                                     <select name="e_leave" class="form-control">
                                      <?php
                                      $j=0;
                                      while($j<=$e){
                                      ?>
      <option value="<?php echo$j ?>"><?php echo$j ?></option>
      <?php
      $j++;
      }
      ?>
      </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-4 col-form-label form-control-label">Sick Leave:</label>
                                  <div class="col-lg-8">
                                    <?php
                                      $s=$result5['s_leave'];
                                     ?>
                                     <select name="s_leave" class="form-control">
                                      <?php
                                      $k=0;
                                      while($k<=$s){
                                      ?>
      <option value="<?php echo$k ?>"><?php echo$k ?></option>
      <?php
      $k++;
      }
      ?>
      </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-4 col-form-label form-control-label">Other Leave:</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" name="other" value="0" placeholder="Enter Other Leave With Reason">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-control-label">leave From:</label>
                            <div class="col-lg-8">
                               <input type="date" class="form-control" name="leave_from">
                            </div>
                        </div>
                        <div class="form-group row">
                                  <label class="col-lg-4 col-form-label form-control-label">leave To:</label>
                                  <div class="col-lg-8">
                                    <input type="date" class="form-control" name="leave_to">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-4 col-form-label form-control-label">Reason:</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" name="reason" placeholder="Enter Reason For Leave">
                                  </div>
                                </div>
                                <input type="hidden" name="name" value="<?php echo$result['name'];?>">
                                <input type="hidden" name="email" value="<?php echo$result['email'];?>">
                                <input type="hidden" name="time" value="<?php echo " " . date("Y-m-d");echo " " . date("h:i A");?>">
                                <button style="margin-top:12px;margin-bottom:12px;" type="submit" name="submit" class="btn btn-success btn-block">APPLY LEAVE</button>
                              </div>
                            </div>
                          </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>