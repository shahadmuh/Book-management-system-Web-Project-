
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="home.php"">Home Page</a>
  
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
    
      </div>
    </header>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
                  <form class="form-signin" action="#" method="post">
     
  <br>
  <br>
  <br>
  
        <h2 class="form-signin-heading">Please sign in</h2>
    
    
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus>
        <span id="ava"></span>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <div class="radio">
          <label>
            <input type="radio" value="librarian" name="radiob" checked>  Librarian
          </label>
      &nbsp;&nbsp;&nbsp; 
      <label>
            <input type="radio" value="member" name="radiob"> Member
          </label>
        </div>
        <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <label>
            <a href="signup.php">Sign up </a>  
            <br>
            <br>   
    </label>
    </form>
    <?php
session_start();
if(isset($_POST['submit'])){
if (empty($_POST['username']) || empty($_POST['password'])) {
echo "<p style='color:red;'>"."Username or  Password is invalid"."</p>";
die();}
else
{
      $username=$_POST["username"];
      $password=$_POST["password"];
      $type=$_POST["radiob"];
if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$username=stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
if($type=='member'){
      $query="SELECT * FROM Member WHERE memberName= '$username' AND password='$password'";
      if(!($result=mysql_query($query,$database))){
echo "<p style='color:red;'>"."Username or  Password is invalid"."</p>";
die();}
$rows =mysql_num_rows($result);
if($rows==1){
$_SESSION['member']=$username;
$_SESSION['type']="member";
        mysql_close($database);
        header("Location:memberHomePage.php");

    }
else
    {
echo "<p style='color:red;'>"."Username or  Password is invalid"."</p>";
mysql_close($database);
       }
}

      
else  if($type=='librarian'){
      $query="SELECT * FROM Librarian WHERE librarianName = '$username' AND password = '$password'";
 if(!($result=mysql_query($query,$database))){
echo "<p style='color:red;'>"."Username or  Password is invalid"."</p>";
die();}
$rows =mysql_num_rows($result);
if($rows==1){
$_SESSION['lib']=$username;
$_SESSION['type']="admin";
        mysql_close($database);
        header("Location:librarian.php");

    }
else
    {
echo "<p style='color:red;'>"."Username or  Password is invalid"."</p>";
mysql_close($database);
    }

}
}
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