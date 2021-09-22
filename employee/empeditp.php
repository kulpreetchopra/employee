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
$query ="select * From employee where id=$id";
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

    echo$name= $_POST['name'];
    echo$email= $_POST['email'];
    echo$mobile= $_POST['mobile'];
    echo$address= $_POST['address'];
    echo$gender= $_POST['gender'];
    echo$password =$_POST['password'];

   $qs ="UPDATE employee SET name='$name',email='$email',mobile='$mobile',address='$address',gender='$gender',password='$password' WHERE id=$id";

   $fire =mysqli_query($con, $qs);
    if($fire)echo "data updated successfully.";
    if($fire){
    $_SESSION['succes']="Profile Updatted Successfully!!";
    header("location:index.php");
  }else{
    $_SESSION['error']="Profile Updatted Unsuccessfully!!";
    header("location:index.php");
    // echo "<div class='alert alert-danger'>Query Failed.</div>";
  }
}
?>
<div class="card container-fluid" style="background-color:transparent!important;">
  <h5 class="text-center">Task <i class="fas fa-user-edit"></i> / <a style="color:#007bff!important;" href="index.php"><i class="fas fa-eye"></i></a></h5>
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
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-12">
                                <button type="submit" name="update" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>
                    </form>
          </div>
                