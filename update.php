<?php
session_start();
if(!isset($_SESSION['member'])){ //
header("location: signin.php");
}?>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

     <!-- My style -->
<link rel="stylesheet" type="text/css" href="moreStyle.css">


  </head>


  <body id="page-top">

    <!-- Navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="memberHomePage.php"">Home Page</a> 
         
         <div id="submenu"> 
              <a class="navbar-brand js-scroll-trigger" href="#">Account</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="update.php">Update Information</a>
              <a class="nav-link js-scroll-trigger" href="logout.php">Sign Out</a>
              </div>
              </div>
        
        <div id="submenu"> 
              <a class="navbar-brand js-scroll-trigger" href="#">View</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="memberViweCategory.php">Books Categories</a>
              <a class="nav-link js-scroll-trigger" href="issueBooktohim.php">Issued Books</a>
              <a class="nav-link js-scroll-trigger" href="issueBookHistory.php">Issued Books History</a>
              <a class="nav-link js-scroll-trigger" href="viewNotification.php">Notifications</a>
</div>
              </div>  
              
 
 <div id="submenu"> 
              <a class="navbar-brand js-scroll-trigger" href="#">Request</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="extend.php">Extend Due Date</a>
</div>
              </div>  
 
 <a class="navbar-brand js-scroll-trigger" href="SearchBookM.php">Search</a>


    <a class="nav-link js-scroll-trigger" href="signout.php"><img src="utilities.png" align="right" width="30px"class="ml" ></a>
    </nav> 
    
    <!-- Navigation -->

    
    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>UPDATE</h1>
     </header>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
                  <form class="form-signin" action="#" method="post">
     
<br>
  <br>
  <br>
  
        <h2 class="form-signin-heading">Update Information</h2>
            <br>
         
     New First name
        <input type="text"  class="form-control" name="fName" placeholder="First name" autofocus>
        <br> 
    New Last name
        <input type="text"  class="form-control" name="lName" placeholder="Last name" >
        <br> 
        New Member name
        <input type="text"  class="form-control" name="memberName" placeholder="Member Name"  >
        <br> 
        New Email
        <input type="text"  class="form-control" name="email" placeholder="Email" > 
        <br> 
        New Password
        <input type="password" class="form-control" name="password" placeholder="Password" >
        
        <div class="radio">
          
          
        </div>
            <br>
            <br>   
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
   
   
    </form>
          </div>
        </div>
        
      </div>

 <?php
      if(isset($_POST["submit"])){

if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
  

$user=$_SESSION['member'];
   
  $fName=$_POST["fName"];
  if($fName!=""){
    $fName = test_input($_POST["fName"]);
      $sql=mysql_query("UPDATE Member SET fName = '$fName' WHERE memberName='$user'");}
         
 $lName = $_POST["lName"];
if($lName!=""){
  $lName = test_input($_POST["lName"]); 
  $sql=mysql_query("UPDATE Member SET lName = '$lName' WHERE memberName='$user'");} /////
  
  
  $password =$_POST["password"];
  if($password!=""){
  $password = test_input($_POST["password"]);
   $sql=mysql_query("UPDATE Member SET password = '$password' WHERE memberName='$user'");}///


  $email = $_POST["email"];
if($email!=""){
  $email = test_input($_POST["email"]); 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<p style='color:red;'>"."Invalid email format"."</p>";
  die(); }
$emailExist=mysql_query("SELECT email FROM Member  WHERE email='$email'");
if(mysql_num_rows($emailExist)>0){
    echo "<div style='color:red; text-align: center;'>"."Email already exists"."</div>";
    
    die(); }
    else {
  $sql=mysql_query("UPDATE Member SET email = '$email' WHERE memberName='$user'");
  
  }} 

      
      
  $memberName = $_POST["memberName"];

if( $memberName!=null){
  $memberName = test_input($_POST["memberName"]);
$memberExist=mysql_query("SELECT memberName FROM Member  WHERE memberName='$memberName'");
 if(mysql_num_rows($memberExist)>0){
    echo "<p style='color:red;'>"."Member name already exists"."</p>"; 
     
    die();}
    else {
      $sql=mysql_query("UPDATE Member SET memberName = '$memberName' WHERE memberName='$user'",$database);
  
    }}
          




echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";

mysql_close($database);
header("Location:signout.php");
    exit;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>







    <br><br><br><br><br><br><br><br><br><br><br>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>
