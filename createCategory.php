 <?php
session_start();
if(!isset($_SESSION['lib'])){
header("location: signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create a new book category</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="moreStyle.css">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="librarian.php"">Home Page</a> 
        <div id="submenu"> 
              <a class="navbar-brand js-scroll-trigger" href="#">Manage Books</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="Issue a book.php">Issue A Book</a>
              <a class="nav-link js-scroll-trigger" href="Addnewbook.php">Add New Book</a>
              <a class="nav-link js-scroll-trigger" href="deletBook.php">Delete Book</a>
              
</div>
              </div>  
              
              <div id="submenu"> 
              <a class="navbar-brand js-scroll-trigger" href="#">View Report</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="viewExistingBook.php">Existing Books</a>
              <a class="nav-link js-scroll-trigger" href="issueBook.php">Issued Books</a>
              </div>
              </div>
 <a class="navbar-brand js-scroll-trigger" href="ViewCategories.php">View Categories</a>
<a class="navbar-brand js-scroll-trigger" href="Sendnotification.php">Send Notification</a>
<a class="navbar-brand js-scroll-trigger" href="Accessallmembersaccounts.php">Access Members</a>
<a class="navbar-brand js-scroll-trigger" href="SearchBook.php">Search</a>


    <a class="nav-link js-scroll-trigger" href="logout.php"><img src="utilities.png" align="right" width="30px"class="ml" ></a>
    </nav> 
    
    <!-- Navigation -->
    
    <header class="bg-primary text-white">
      <div class="container text-center">
               <h1>Create category:</h1>

      </div>
    </header>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
          <form method="post" action="#"> 
                    <input type="text"  class="form-control" name="categoryName" placeholder="Enter the new book category" required autofocus>
        

        <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit" >Create</button>
        </form>
<?php
       if(isset($_POST["submit"])){
       if (empty($_POST['categoryName'])){
        echo "<p style='color:red;'>"."fill the field"."</p>";
die();}      
      $categoryName=$_POST["categoryName"];
      if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$sql=mysql_query("SELECT (categoryName) FROM Category  WHERE categoryName='$categoryName'");
 if(mysql_num_rows($sql)>0){
    echo "<p style='color:red;'>"."Category already exists"."</p>"; 
    die();}
      $query="INSERT INTO Category (categoryName) VALUES('$categoryName')";

if(!($result=mysql_query($query,$database))){
print("<p> could not excute query!</p>");
die(mysql_error());}
mysql_close($database);
 header("Location: ViewCategories.php");
    exit;
}
?>

          </div>
        </div>
      </div>
    </section>

   
   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>
