<?php include("session.php");?>
<?php

include ('dbcon.php');

$r_id = $_GET['r_id'];
echo$id = $_GET['id'];

$q = "DELETE FROM task_reply WHERE  r_id = $r_id ";

mysqli_query($con, $q);

header("Location:message.php?id=$id");


?>