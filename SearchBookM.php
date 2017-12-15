<!DOCTYPE html>
<html lang="en">

  <head>
  <?php
session_start();

if(!isset($_SESSION['member'])){
header("location: signin.php");
}
?>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>member home page</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
       <!-- My style -->
<link rel="stylesheet" type="text/css" href="moreStyle.css">

<!-- table css -->
<link rel="stylesheet" type="text/css" href="table.css">

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


    <a class="nav-link js-scroll-trigger" href="logout.php"><img src="utilities.png" align="right" width="30px"class="ml" ></a>
    </nav> 
    
    <!-- Navigation -->

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Search for a book</h1>
        </div>
    </header>

    <section id="about">
      <div class="container">
                <div class="col-lg-8 mx-auto">

        <form method="post" action="#">
        <input type="text" class="form-control" name="search" placeholder="Search for a book by ISBN authors or bookName" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Search</button>
        </form>
        <br><br><br>
      </div>
       <?php
      if(isset($_POST['submit'])){
      if(empty($_POST['search'])){
      echo "<p style='color:red;'>"."fill the field"."</p>";
      die();}      
      $search=test_input($_POST["search"]);   
      if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");   
         
$result = mysql_query("SELECT  *
FROM Book
WHERE ISBN='$search' OR bookName='$search' OR authors='$search'");

if(mysql_num_rows($result)==0){
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p style='color:red;'>"."Not exist!"."</p>";
die();}
echo "<h4>Books Founds:</h4>";
echo "<table id='tabl'>";
echo "<tr>";
echo "<th>Book Name</th>";
echo "<th>Category</th>";
echo "<th>Authors</th>";
echo "<th>Copy</th>";
echo "<th>ISBN</th>";
echo "<th>Number of copies</th>";
echo "</tr>";
while ($row = mysql_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row["bookName"]."</td>";
echo "<td>".$row["categoryName"]."</td>";
echo "<td>".$row["authors"]."</td>";
echo "<td>".$row["copy"]."</td>";
echo "<td>".$row["ISBN"]."</td>";
echo "<td>".$row["numOfCopies"]."</td>";
echo "</tr>";
}
echo "</table>";
mysql_close($database);
}

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
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
