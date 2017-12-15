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

    <title>Send notification</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="moreStyle.css">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

<!-- table css -->
<link rel="stylesheet" type="text/css" href="table.css">


<style>
#button {
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 12px 25px;
    text-decoration: none;
    margin: 3px 1px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
     background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}




#button:hover {
    background-color: #008CBA;
    color: white;

</style>
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
                                   <h1>Send Notification</h1>

      </div>
    </header>

    <section id="about">
      <div class="container">
         <?php 
           if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$result = mysql_query("SELECT  Book.bookName, Book.ISBN, Book.categoryName,Book.copy,Book.authors,issuedBook.date,Member.memberName,Member.email
FROM issuedBook
INNER JOIN Book
ON issuedBook.ISBN=Book.ISBN
INNER JOIN Member
ON Member.memberName = issuedBook.memberName
ORDER BY issuedBook.date"
);
echo "<table id='tabl'>";
echo "<tr>";
echo "<th>Book Name</th>";
echo "<th>ISBN</th>";
echo "<th>Category</th>";
echo "<th>Copy</th>";
echo "<th>Authors</th>";
echo "<th>Date</th>";
echo "<th>Member Name</th>";
echo "<th>Notifications</th>";
echo "</tr>";
static $i=0;
while ($row = mysql_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row["bookName"]."</td>";
echo "<td>".$row["ISBN"]."</td>";
echo "<td>".$row["categoryName"]."</td>";
echo "<td>".$row["copy"]."</td>";
echo "<td>".$row["authors"]."</td>";
echo "<td>".$row["date"]."</td>";
echo "<td>".$row["memberName"]."</td>";
$tmp[$i]=$row["memberName"];
$temp[$i]=$row["ISBN"];
echo '<td><form method="post" action="#">';
echo '<input name="sub" type="submit" value="Send Notification">';
echo '<input type="hidden" name="sub1" value='.$tmp[$i].'>';
echo '<input type="hidden" name="sub2" value='.$temp[$i].'>';
echo "</form></td>";
echo "</tr>";
$i++;
}
echo "</table>";
?>
<?php

if(isset($_POST["sub"])){
if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");
$tmp1=$_POST["sub1"]; 
$tmpp=$_POST["sub2"]; 
$tmp="due date is closed!";
$query=mysql_query("Update issuedBook SET message='$tmp' WHERE memberName='$tmp1' AND ISBN='$tmpp'");
mysql_close($database);
}

?>

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
