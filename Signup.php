
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign up</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
     
     <style>
</style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="home.php"">Home Page</a>
  
    </nav>

    <header class="bg-primary text-white">
     
    </header>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
<form method="post" action="#"> 
  <br>
  <br>
  <br>
   

 <h2>Sign up</h2>   
        <input type="text"  class="form-control" name="fName" placeholder="First name" required autofocus>
        <input type="text"  class="form-control" name="lName" placeholder="Last name" required >
        <input type="text"  class="form-control" name="memberName" placeholder="Member Name" required >
        <input type="text"  class="form-control" name="email" placeholder="Email" required> 
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>
       
    <label>
            <a href="signin.php">Sign in </a>     
    </label>
   

</form>
  <?php
      if(isset($_POST["submit"])){
      if (empty($_POST['memberName']) || empty($_POST['fName'])||empty($_POST['lName'])||empty($_POST['email'])||empty($_POST['password'])){
        echo "<p style='color:red;'>"."fill all fields"."</p>";
die();}      
  $memberName = test_input($_POST["memberName"]);
  $email = test_input($_POST["email"]);
  $fName = test_input($_POST["fName"]);
  $lName = test_input($_POST["lName"]);
  $password = test_input($_POST["password"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<p style='color:red;'>"."Invalid email format"."</p>";
  die();
 
}
if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$sql=mysql_query("SELECT memberName FROM Member  WHERE memberName='$memberName'");
$sql2=mysql_query("SELECT email FROM Member  WHERE email='$email'");

 if(mysql_num_rows($sql)>0){
    echo "<p style='color:red;'>"."Member name already exists"."</p>"; 
    die();}
 else if(mysql_num_rows($sql2)>0){
    echo "<p style='color:red;'>"."Email already exists"."</p>";
    die();}
else{
      $query="INSERT INTO Member (memberName,password,fName,lName,email) VALUES('$memberName','$password','$fName','$lName','$email')";

if(!($result=mysql_query($query,$database))){
die(mysql_error());}
mysql_close($database);
header("Location: memberHomePage.php");
    exit;
}

 
} 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    
          </div>
        </div>
       
      </div>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>


</html>
