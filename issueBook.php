
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

<link rel="stylesheet" type="text/css" href="table.css">


<style>

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
   <h1>Issued Books </h1>
      </div>
    </header>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
  <br>
  <br>
  <br>
  
  
  
  <?php
  if(!($database=mysql_connect("localhost","root","")))
die ("<p>Could not connect to database</p>");
if(!mysql_select_db("Library management system",$database))
die ("<p>Could not open Library management system database</p>");

$rss = mysql_query("SELECT * FROM issuedBook WHERE issued='1' ORDER BY date DESC",$database); 
   
     echo "<table id='tabl' >";
        echo "<tr>";
    echo "<th>MemberName</th>";
       echo "<th>issued Date</th>";
       echo "<th>Book Name</th>";
        echo "<th>Copy</th>";
        echo "<th>Authors</th>";
        echo "<th>ISBN</th>";
        echo "<th>Category</th>";
        echo "<th>Number of copies</th>";
        echo "</tr>";
       
              while ($row = mysql_fetch_assoc($rss)) {
           echo "<tr>";
           echo "<td>".$row['memberName']."</td>";
           echo "<td>".$row['date']."</td>";
           $rs=mysql_query("SELECT * FROM Book WHERE ISBN=".$row['ISBN'],$database);
           $row2=mysql_fetch_assoc($rs);
          echo "<td>".$row2['bookName']."</td>";
           echo "<td>".$row2['copy']."</td>";
           echo "<td>".$row2['authors']."</td>";
           echo "<td>".$row2['ISBN']."</td>";
           echo "<td>".$row2['categoryName']."</td>";
           echo "<td>".$row2['numOfCopies']."</td>";
            echo "</tr>";
       }
             echo "</table>";
             
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
 
  
   
 
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>
 
  </body>
 
</html>