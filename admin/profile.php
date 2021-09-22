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
                <?php
                if($result['department']=='hr'){
                ?>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#registration" data-toggle="tab" class="nav-link"><i class="fas fa-user-edit"></i><b> Register</b></a>
                </li>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#cv" data-toggle="tab" class="nav-link"><i class="far fa-file-pdf"></i><b> Resume</b></a>
                </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#admin" data-toggle="tab" class="nav-link"><i class="fas fa-eye"></i><b> admin</b></a>
                </li>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#employee" data-toggle="tab" class="nav-link"><i class="fas fa-eye"></i><b> employee</b></a>
                </li>
                <?php
                          if($result['department']!='hr') {
                          ?>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#task" data-toggle="tab" class="nav-link"><i class="fas fa-user-edit"></i><b> Task</b></a>
                </li>
              <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#leave" data-toggle="tab" class="nav-link"><i class="fas fa-user-edit"></i><b> Leave</b></a>
                </li>
                <?php
              }
              ?>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#empleave" data-toggle="tab" class="nav-link"><i class="fas fa-eye"></i><b> Leave</b></a>
                </li>
            </ul>
            <div class="tab-content py-4">
              <div class="tab-pane" id="registration">
                    <form onsubmit="return register()" action="register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name:</label>
                            <div class="col-lg-9">
                               <input id="name" type="text" class="form-control" name="name" placeholder="Enter Full Name">
                               <span id="rname" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email:</label>
                            <div class="col-lg-9">
                               <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email Address">
                               <span id="remail" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile:</label>
                            <div class="col-lg-9">
                                <input id="mobile" type="mobile" class="form-control" name="mobile" placeholder="Enter Mobile Number">
                                <span id="rmobile" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">IMAGE:</label>
                            <div class="col-lg-9">
                                <input id="file" type="file" class="form-control" name="image">
                                <span id="rfile" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address:</label>
                            <div class="col-lg-9">
                                <textarea id="address" type="text" class="form-control" name="address" placeholder="Enter Address"></textarea>
                                <span id="raddress" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender:</label>
                            <div class="col-lg-9">
                    <input type="radio" id="gen1" value="male" name="gender">Male
                    <input type="radio" id="gen2" value="female" name="gender">Female
                    <br>
                    <span id="gender" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password:</label>
                            <div class="col-lg-9">
                                <input id="password" type="text" class="form-control" name="password" placeholder="Enter Password">
                                <span id="rpassword" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department:</label>
                            <div class="col-lg-9">
          <select id="department" name="department" class="form-control">
      <option value="-1">SELECT</option>
      <option value="frontend">FRONTEND</option>
      <option value="backend">BACKEND</option>
      <option value="hr">HR DEPT</option>
      <option value="pramotion">PRAMOTION</option>
      </select>
      <span id="rdepartment" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Role:</label>
                            <div class="col-lg-9">
          <select id="role" name="role" class="form-control">
      <option value="-1">SELECT</option>
      <option value="employee">EMPLOYEE</option>
      <option value="admin">ADMIN</option>
      </select>
      <span id="rrole" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-12">
                                <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                <div class="tab-pane" id="leave">
                    <form action="assign_leave.php" method="post" enctype="multipart/form-data">
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
                            <input type="checkbox" name="assign_to[]" value="<?php echo$result3['id'];?>">
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
                            <input type="hidden" name="assign_by" value="<?php echo$result['name'];?>">
                            <input type="hidden" name="time" value="<?php echo " " . date("Y-m-d");echo " " . date("h:i A");?>">
                          <?php
                          }
                          ?>
                          </div>
                          <br>
                          <div class="col-md-7" style="border:2px solid white;">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-lg-7 col-form-label form-control-label">Casual Leave:</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" name="c_leave" placeholder="Enter Casual Leave">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-7 col-form-label form-control-label">Earned Leave:</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" name="e_leave" placeholder="Enter Earned Leave">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-7 col-form-label form-control-label">Sick Leave:</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" name="s_leave" placeholder="Enter Sick Leave">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Valid From:</label>
                            <div class="col-lg-6">
                               <input type="date" class="form-control" name="valid_from">
                            </div>
                        </div>
                        <div class="form-group row">
                                  <label class="col-lg-6 col-form-label form-control-label">Valid To:</label>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" name="valid_to">
                                  </div>
                                </div>
                                <button style="margin-top:12px;margin-bottom:12px;" type="submit" name="submit" class="btn btn-success btn-block">ASSIGN LEAVE</button>
                              </div>
                            </div>
                          </div>
                      </div>
                    </form>
                </div><br>
                <center>
                <a href="viewleave.php"><button style="margin-top:12px;margin-bottom:12px;" class="btn btn-info"><b><i class="fas fa-eye"></i> ALL ASSIGN LEAVES</b></button></a>
                </center>
            </div>
            <div class="tab-pane" id="empleave">
                  <?php
       include ('dbcon.php');
       $q7 = "select * from apply_leave order by id desc";
       $query7 = mysqli_query($con, $q7);
  ?>
  <i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>Pending,<i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>Approved,<i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>Rejected.
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
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
                        <td><?php echo$result7['name']?></td>
                        <td><?php echo$result7['email']?></td>
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
                         <form action="lstatusupdate.php?id=<?php echo$result7['id'] ?>" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="admin" value="<?php echo$result['name']?>"> 
        <input type="radio" value="rejected"<?php echo ($result7["status"]=='rejected')?'checked':'' ?> name="status"><i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>
        <input type="radio" value="approved"<?php echo ($result7["status"]=='approved')?'checked':'' ?> name="status"><i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>
        <input type="radio" value="pending"<?php echo ($result7["status"]=='pending')?'checked':'' ?> name="status"><i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>
        <br><input type="submit" name="update" value="update">
        </form>
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
                <?php
       include ('dbcon.php');
       $q2 = "select * from employee WHERE  `role`='employee'  order by id desc";
       $query2 = mysqli_query($con, $q2);
  ?>
                <!-- reservation -->
                <div class="tab-pane" id="employee">
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>Id</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Department</th>
                      <th>Time</th>
                      <?php
                          if($result['department']=='hr') {
                      ?>
                      <th>Password</th>
                      <th>Action</th>
                      <?php
                    }
                    ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      while ($result2 = mysqli_fetch_array($query2)) {
                      ?>
                        <td><?php echo$result2['id']?></td>
                        <td  class="text-center"><img src="<?php echo $result2['image']?>" width="80" height="80" style="border-radius:50%">
                          <?php
                          if($result['department']=='hr') {
                          ?>
                        <br>
        <form action="imageupdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result2['id']?>">  
        <input type="file" name="image">
        <br><input type="submit" name="update" value="update">
        </form>
        <?php
      }
      ?>
                        </td>
                        <td><?php echo$result2['name']?></td>
                        <td><a href="mailto:<?php echo $result2['email']?>"><?php echo $result2['email']?></a></td>
                        <td><a href="tel:<?php echo $result2['mobile']?>"><?php echo $result2['mobile']?></a></td>
                        <td><?php echo substr($result2['address'],0,12);echo"..."?></td>
                        <td><?php echo$result2['gender']?></td>
                        <td><?php echo$result2['department']?></td>
                        <td><?php echo$result2['time']?></td>
                        <?php
                          if($result['department']=='hr') {
                          ?>
                        <td><a href="mailto:<?php echo $result2['email']?>"><i class="fas fa-key" style="color:<?php echo $result2['forgott_pass']?>"></i></a></i><?php echo $result2['password']?></td>
                        <td>
                          <a class="text-left" href="empedit.php?id=<?php echo $result2['id']?>"><i class="fas fa-edit"></i>&nbsp;</a>
        <a href="empdelet.php?id=<?php echo $result2['id']?>">&nbsp;<i class="fas fa-trash"></i></a>
        </td>
        <?php
      }
      ?>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
                </div>
                <?php
       include ('dbcon.php');
       $q2 = "select * from resume order by id desc";
       $query2 = mysqli_query($con, $q2);
  ?>
                <!-- reservation -->
                <div class="tab-pane" id="cv">
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Resume</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      while ($result2 = mysqli_fetch_array($query2)) {
                      ?>
                        <td><?php echo$result2['id']?></td>
                        <td><?php echo$result2['name']?></td>
                        <td><a href="mailto:<?php echo $result2['email']?>"><?php echo $result2['email']?></a></td>
                        <td><a href="../<?php echo$result2['file']?>"><i class="fas fa-download"></i></a><?php echo$result2['file']?></td>
                          <td><?php echo$result2['time']?></td>
                          <td>
        <a href="cvdelet.php?id=<?php echo $result2['id']?>">&nbsp;<i class="fas fa-trash"></i></a>
        </td>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
                </div>
                <?php
       include ('dbcon.php');
       $q2 = "select * from employee WHERE  `role`='admin'  order by id desc";
       $query2 = mysqli_query($con, $q2);
  ?>
                <!-- reservation -->
                <div class="tab-pane" id="admin">
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>Id</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Department</th>
                      <th>Time</th>
                      <?php
                          if($result['department']=='hr') {
                          ?>
                      <th>Password</th>
                      <th>Action</th>
                      <?php
                    }
                    ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      while ($result6 = mysqli_fetch_array($query2)) {
                      ?>
                        <td><?php echo$result6['id']?></td>
                        <td  class="text-center"><img src="<?php echo $result6['image']?>" width="80" height="80" style="border-radius:50%">
                          <?php
                          if($result['department']=='hr') {
                          ?>
                        <br>
        <form action="imageupdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result6['id']?>">  
        <input type="file" name="image">
        <br><input type="submit" name="update" value="update">
        </form>
        <?php
      }
      ?>
                        </td>
                        <td><?php echo$result6['name']?></td>
                        <td><a href="mailto:<?php echo $result6['email']?>"><?php echo $result6['email']?></a></td>
                        <td><a href="tel:<?php echo $result6['mobile']?>"><?php echo $result6['mobile']?></a></td>
                        <td><?php echo substr($result6['address'],0,12);echo"..."?></td>
                        <td><?php echo$result6['gender']?></td>
                        <td><?php echo$result6['department']?></td>
                        <td><?php echo$result6['time']?></td>
                        <?php
                          if($result['department']=='hr') {
                          ?>
                        <td><a href="mailto:<?php echo $result6['email']?>"><i class="fas fa-key" style="color:<?php echo $result6['forgott_pass']?>"></i></a></i><?php echo $result6['password']?></td>
                        <td>
                          <a class="text-left" href="empedit.php?id=<?php echo $result6['id']?>"><i class="fas fa-edit"></i>&nbsp;</a>
        <a href="empdelet.php?id=<?php echo $result6['id']?>">&nbsp;<i class="fas fa-trash"></i></a>
        </td>
        <?php
      }
      ?>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
                </div>
                <div class="tab-pane" id="task">
                    <form action="task.php" method="post" enctype="multipart/form-data">
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
                            <input type="checkbox" name="emp_id[]" value="<?php echo$result3['id'];?>">
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
                            <textarea style="margin-top:12px;" name="message" class="form-control"rows="4" placeholder="&#129488 Assign Task To Employees...."></textarea>
                            <button style="margin-top:12px;margin-bottom:12px;" type="submit" name="submit" class="btn btn-success btn-block">SEND TASK</button>
                          </div>
                      </div>
                    </form>
                </div>
                <br>
                <center>
                <a href="viewtask.php"><button style="margin-top:12px;margin-bottom:12px;" class="btn btn-info"><b><i class="fas fa-eye"></i> ALL ASSIGN TASKS</b></button></a>
                </center>
            </div>
        </div>
    </div>
</div>
</div>