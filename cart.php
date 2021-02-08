<?php
require("db_rw.php");
session_start();
if(isset($_GET["url"])){
	$No=$_GET['No'];
	if($_GET["url"]=="brand"){
	getInfo();
	header("Location:index.php");
	echo $_SESSION["uid"];
}
else if($_GET["url"]=="category"){
	getInfo();
	header("Location:index.php?category=$No");
	//$_SESSION["uid"];
}
}
else{
	getInfo();
	header("Location:index.php");
}
function getInfo(){
	$p_id=$_GET["productID"];
	if(isset($_COOKIE["u_id"])){
		$_SESSION["uid"]=$_COOKIE["u_id"];
	}
	else{
		$_SESSION["uid"]=-1;
	}
	$u_id=$_SESSION["uid"];
	$sql="INSERT INTO `cart` (`sl_no`,`p_id`, `u_id`, `qty`) VALUES (NULL,'".$p_id."', '".$u_id."', '1')";
	$jsn=updateDB($sql);	
}
?>