<?php
require 'connect.php';

$adm_no=$_POST['admnum'];
$URcode=$_POST['bcode'];
$idate=$_POST['dt'];
$fn=$_POST['fine'];
$sql = "INSERT INTO `return`(`Student_No`,`bookcode`,`issue_date`,`fine`) VALUES ('$adm_no','$URcode','$idate','$fn')";
$run = mysqli_query($con, $sql);

$sql2 = "UPDATE `book` SET stock = stock + 1 WHERE bookcode='$URcode'";
$run2 = mysqli_query($con, $sql2);
	
$sql3 = "UPDATE `issue` SET status='0' WHERE bookcode='$URcode' AND Student_No = '$adm_no'";
$run3 = mysqli_query($con, $sql3);
	
header("Location: book_return.php");
?>