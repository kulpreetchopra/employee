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
       $result['department'];
       
  ?>
  <?php
include ('dbcon.php');

if (isset($_GET['id']))
{
$id =$_GET['id'];
$query ="select * From employee where id=$id";
$fire =mysqli_query($con,$query);

//if($fire)echo "we got the data.";
$user = mysqli_fetch_assoc($fire);
$user['name'];

}
?>
<div class="card container-fluid" style="background-color:transparent!important;">
  <h5 class="text-center">Profile <i class="fas fa-user-edit"></i> / <a style="color:#007bff!important;" href="index.php"><i class="fas fa-eye"></i></a></h5>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name:</label>
                            <div class="col-lg-9">
                               <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="<?php echo $user['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email:</label>
                            <div class="col-lg-9">
                               <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="<?php echo $user['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile:</label>
                            <div class="col-lg-9">
                                <input type="mobile" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="<?php echo $user['mobile']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address:</label>
                            <div class="col-lg-9">
                                <textarea type="text" class="form-control" name="address" placeholder="Enter Address"><?php echo $user['address'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender:</label>
                            <div class="col-lg-9">
                    <input type="radio" value="male"<?php echo ($user["gender"]=='male')?'checked':'' ?> name="gender">Male
                    <input type="radio" value="female"<?php echo ($user["gender"]=='female')?'checked':'' ?> name="gender">Female
                    <br>
                    </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="password" placeholder="Enter Password" value="<?php echo $user['password']; ?>">
                            </div>
                        </div>
                        <?php
                        if($result['department']=='hr'){
                        ?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Forgott Password:</label>
                            <div class="col-lg-9">
                    <input type="radio" value="green"<?php echo ($user["forgott_pass"]=='green')?'checked':'' ?> name="forgott_pass"><i class="fas fa-key" style="color:green"></i>
                    <input type="radio" value="red"<?php echo ($user["forgott_pass"]=='red')?'checked':'' ?> name="forgott_pass"><i class="fas fa-key" style="color:red"></i>
                    <br>
                    </div>
                  </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department:</label>
                            <div class="col-lg-9">
          <select value="<?php echo $user['department'];?>" name="department" class="form-control">
      <option value="-1">SELECT</option>
      <option value="frontend"<?php
        if($user['department']=='frontend')
        {echo "selected";}
      ?>>FRONTEND</option>
      <option value="backend"<?php
        if($user['department']=='backend')
        {echo "selected";}
      ?>>BACKEND</option>
      <option value="hr"<?php
        if($user['department']=='hr')
        {echo "selected";}
      ?>>HR DEPT</option>
      <option value="pramotion"<?php
        if($user['department']=='pramotion')
        {echo "selected";}
      ?>>PRAMOTION</option>
      </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Role:</label>
                            <div class="col-lg-9">
          <select value="<?php echo $user['role'];?>" name="role" class="form-control">
      <option value="-1">SELECT</option>
      <option value="employee"<?php
        if($user['role']=='employee')
        {echo "selected";}
      ?>>EMPLOYEE</option>
      <option value="admin"<?php
        if($user['role']=='admin')
        {echo "selected";}
      ?>>ADMIN</option>
      </select>
                            </div>
                        </div>
                        <?php
                      }
                      ?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-12">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                    </form>
          </div>

<!-- update -->
<?php   
include('dbcon.php');


  if(isset($_POST['submit'])){

    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $address= $_POST['address'];
    $gender= $_POST['gender'];
    $password =$_POST['password'];
    
    if($result['department']=='hr'){
      $department =$_POST['department'];
      $role =$_POST['role'];
      $forgott_pass=$_POST['forgott_pass'];
    }
   if($result['department']=='hr'){
   $qsr ="UPDATE employee SET name='$name',email='$email',mobile='$mobile',address='$address',gender='$gender',department='$department',password='$password',role='$role',forgott_pass='$forgott_pass' WHERE id=$id";
   }
   else{
    $qsr ="UPDATE employee SET name='$name',email='$email',mobile='$mobile',address='$address',gender='$gender',password='$password' WHERE id=$id";
   }

   $fire =mysqli_query($con, $qsr);
   if($fire){
    echo$_SESSION['succes']="Data Updated Successfully!!";
  }else{
    echo$_SESSION['error']="Data Updated Unsuccessfully!!";
  }
}
?>
                