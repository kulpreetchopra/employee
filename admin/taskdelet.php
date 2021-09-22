<?php include("session.php");?>
<?php

include ('dbcon.php');

echo$id = $_GET['id'];

$q = "DELETE FROM task WHERE  id = $id ";

mysqli_query($con, $q);

header("Location:viewtask.php?id=$id");


?>