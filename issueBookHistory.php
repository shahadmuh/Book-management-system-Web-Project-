
<!DOCTYPE html>
<html lang="en">
 
 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view issued book</title>
    
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
         <h1>Issued Books</h1>  

      </div>
    </header>
 
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
  <br><br><br><br><br>
  <h2> Books you have issued:</h2>
  <br>
       <?php 
       session_start();
if(!isset($_SESSION['member'])){
header("location: signin.php");
}
if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$result = mysql_query("SELECT  Book.bookName, Book.ISBN,Book.copy,issuedBook.date,Member.memberName,issuedBook.issued
FROM issuedBook
INNER JOIN Book
ON issuedBook.ISBN=Book.ISBN
INNER JOIN Member
ON Member.memberName = issuedBook.memberName
WHERE Member.memberName='".$_SESSION['member']."'");
echo "<table id='tabl'>";
echo "<tr>";
echo "<th>Book Name</th>";
echo "<th>ISBN</th>";
echo "<th>Copy</th>";
echo "<th>Date</th>";
echo "<th>Issued</th>";
echo "</tr>";

while ($row = mysql_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row["bookName"]."</td>";
echo "<td>".$row["ISBN"]."</td>";
echo "<td>".$row["copy"]."</td>";
echo "<td>".$row["date"]."</td>";
if($row["issued"]==0)
$tmp="No";
else $tmp="Yes";
echo "<td>".$tmp."</td>";
echo "</tr>";
}
echo "</table>";

echo"<br><br><br><br>";echo"<br><br><br><br>";
mysql_close($database);
exit;
?>
          </div>
        </div>
      
      </div>
 
<br>
<br>
<br>
<br>
<br>
<br>
 
  
    <!-- Footer -->
     <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        
      </div>
      <!-- /.container -->
    </footer>
 
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>
 
  </body>
 
</html>