<?php include("session.php");?>
<?php

include ('dbcon.php');

$id = $_GET['id'];

$q = "DELETE FROM employee WHERE  id = $id ";

mysqli_query($con, $q);

header ('location:index.php');


?>