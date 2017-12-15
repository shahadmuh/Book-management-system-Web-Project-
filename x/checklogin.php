<?php
session_start();
if(isset($_POST['submit'])){

if (empty($_POST['username']) || empty($_POST['password'])) 
$error = "Username or  Password is invalid";

else
{
      $username=$_POST["username"];
      $password=$_POST["password"];
      $type=$_POST["radiob"];
       $_SESSION['username'] = $username;
      
if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$ID=stripslashes($ID);
$password = stripslashes($password);
//$ID = mysql_real_escape_string($ID);
//$password = mysql_real_escape_string($password);
if($type=='member'){
      $query="SELECT * FROM Member WHERE memberName= '$username' AND password='$password'";
      if(!($result=mysql_query($query,$database))){
print("<p> could not excute query!</p>");
die(mysql_error());}
$rows =mysql_num_rows($result);
if($rows==1){
$_SESSION['id']=$ID;
$_SESSION['type']="member";
        mysql_close($database);
        header("Location:memberHomePage.php");

    }
else
    {
$error="user name or password is not valid";
mysql_close($database);
        header("Location:signin.php");}
}

      
else   if($type=='librarian'){
      $query="SELECT * FROM Librarian WHERE librarianName = '$username' AND password = '$password'";
 if(!($result=mysql_query($query,$database))){
print("<p> could not excute query!</p>");
die(mysql_error());}
$rows =mysql_num_rows($result);
if($rows==1){
$_SESSION['id']=$ID;
$_SESSION['type']="admin";
        mysql_close($database);
        header("Location:librarian.php");

    }
else
    {
$error="user name or password is not valid";
mysql_close($database);
    header("Location:signin.php");}

}
}
}


// if (!empty($_POST['username'])){
//     $username = $_POST['username'];
//   //   echo $username;
//     $_SESSION['username'] = $username; }
// ?>
?>