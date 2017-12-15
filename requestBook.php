<?php
session_start();

if(!isset($_SESSION['member'])){
header("location: signin.php");
}

$database=mysql_connect("localhost","root","");
$sdb=mysql_select_db("Library management system",$database);
if(isset($_POST['SS'])){
if(isset($_POST['requstedBook'])&&is_array($_POST['requstedBook'])){
foreach($_POST['requstedBook'] as $selectd){
$name=$_SESSION['member'];
$date=date("Y-m-d");
$query="INSERT INTO issuedBook(ISBN, date, memberName, issued) VALUES ('$selectd','$date','$name','t')";
 $result=mysql_query($query,$database);}

} mysql_close($database);
 header("location:memberViweCategory.php");
}


?>