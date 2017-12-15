<?php
session_start();

if(!isset($_SESSION['lib'])){
header("location: signin.php");
}

$database=mysql_connect("localhost","root","");
$sdb=mysql_select_db("Library management system",$database);
if(isset($_POST['SS'])){
if(isset($_POST['issuedBooks'])&&is_array($_POST['issuedBooks'])){
foreach($_POST['issuedBooks'] as $selectd){

$query="UPDATE  issuedBook SET issued='1' WHERE id='$selectd'";
 $result=mysql_query($query,$database);}

} mysql_close($database);
 header("location:Issue a book.php");
}


?>