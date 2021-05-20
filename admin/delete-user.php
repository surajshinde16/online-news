<?php 

include "config.php";

$userid = $_GET['id'];

$sql="DELETE FROM users WHERE user_id={$userid}";

if (pg_query($conn,$sql)) {
	      header("Location:http://localhost/news_project/admin/users.php");
}else{
	echo "<p>Can't Delete Record</p>";
}

pg_close($conn);

 ?>
 