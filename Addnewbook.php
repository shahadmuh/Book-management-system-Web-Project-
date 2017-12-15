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

    <title>Add new book</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="moreStyle.css">

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


    <a class="nav-link js-scroll-trigger" href="logout.php"><img src="utilities.png" align="right" width="30px"class="ml" ></a>
    </nav> 
    
    <!-- Navigation -->

    <header class="bg-primary text-white">
      <div class="container text-center">
               <h1>Add Book</h1>
               </div>
               </header>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
          <form method="post" action="#">
<br>Book's Name
    <input type="text"  class="form-control" name="bookName" placeholder="Enter book name" required autofocus>
<br>Which copy?
    <input type="text"  class="form-control" name="copy" placeholder="Enter copy of the book" required >
<br>Author's Name
    <input type="text"  class="form-control" name="authors" placeholder="Enter authors name" required >
<br>ISBN
    <input type="text"  class="form-control" name="ISBN" placeholder="Enter ISBN" required >
<br>Number of Copies
    <input type="text"  class="form-control" name="numOfCopies" placeholder="Enter number of copies" required >
<br>Catogary    <input type="text" class="form-control" name="categoryName" placeholder="Enter it's type(category)" required>
<br><br>  
<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add</button>
        </form>
        <?php


      if(isset($_POST["submit"])){
      if (empty($_POST['bookName']) || empty($_POST['copy'])||empty($_POST['authors'])||empty($_POST['ISBN'])||empty($_POST['categoryName'])){
        echo "<p style='color:red;'>"."fill all fields"."</p>";
die();}      
  $bookName = test_input($_POST["bookName"]);
  $copy = test_input($_POST["copy"]);
  $authors = test_input($_POST["authors"]);
  $ISBN = test_input($_POST["ISBN"]);
  $categoryName = test_input($_POST["categoryName"]);
  $numOfCopies = test_input($_POST["numOfCopies"]);

 
if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$sql1=mysql_query("SELECT ISBN FROM Book  WHERE ISBN='$ISBN'");
if(mysql_num_rows($sql1)>0){
    echo "<p style='color:red;'>"."This book already exists"."</p>"; 
    die();}
$sql=mysql_query("SELECT categoryName FROM Category  WHERE categoryName='$categoryName'");
 if(mysql_num_rows($sql)==0){
       $sql1=mysql_query("INSERT INTO Category (categoryName) VALUES('$categoryName')");
}

$query="INSERT INTO Book (bookName,copy,authors,ISBN,categoryName ,numOfCopies) VALUES('$bookName','$copy','$authors','$ISBN','$categoryName','$numOfCopies')";
if(!($result=mysql_query($query,$database))){
die(mysql_error());}
mysql_close($database);
header("Location: librarian.php");
    exit;
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
