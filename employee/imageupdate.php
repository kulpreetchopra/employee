<?php
error_reporting(0);
?>
  <?php
 include ('dbcon.php');
 if(isset($_REQUEST['update']))
 {
  $file=$_FILES["image"]["name"];
    // echo $file;
    $tmp_name =$_FILES["image"]["tmp_name"];
    $path ="../image/".$file;
    //only jpg,png,upload
$file1 =explode(".", $file); //image.jpg Arrays
    $file1[1];   //jpg
    $ext =$file1[1];
    $allowed=array("jpg","png","gif");
    $id=$_REQUEST['id'];
    if(in_array($ext, $allowed))
    { 
 move_uploaded_file($tmp_name,$path);
    $query ="UPDATE employee SET image = '$path'where id='$id' ";
    echo$fire = mysqli_query($con, $query);
    if($fire){
    $_SESSION['success']="Image Updatted Successfully!!";
    header("location:index.php");
  }
  else{
    $_SESSION['errorr']="Image Updatted Unsuccessfully!!";
    header("location:index.php");
  }
}
} 
?>