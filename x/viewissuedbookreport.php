<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View report of issued book</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="moreStyle.css">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     
          <ul class="navbar-nav ml-auto">
           <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="librarian.html">Home</a>
            </li>
            <li class="nav-item">
<div id="submenu">
              <a class="nav-link js-scroll-trigger" href="#">Manage books</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="Issue a book.html">Issue a book</a>
              <a class="nav-link js-scroll-trigger" href="Add new book.html">Add a new book</a>
              <a class="nav-link js-scroll-trigger" href="Delete a book.html">Delete a book</a>
              <a class="nav-link js-scroll-trigger" href="edit book.html">Edit book information</a>
</div>
              </div>
              </li>
           <li class="nav-item">
<div id="submenu">
              <a class="nav-link js-scroll-trigger" href="#">View report</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="view existing book report.html">existing books</a>
              <a class="nav-link js-scroll-trigger" href="view issued book report.html">issued books</a>
              
              </div>
              </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="View categories.html">View categories</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="Send notification.html">Send notification</a>
            </li>
           
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="Access all members accounts.html">Access all members accounts</a>
            </li>    
          </ul>
               <a class="nav-link js-scroll-trigger" href="home.html"><img src="utilities.png" width="15%"class="ml" ></a>

    </nav>


    <header class="bg-primary text-white">
      <div class="container text-center">
          <h1>Issued book report:</h1>

      </div>
    </header>
<!-- 
SELECT
  s.StudentID, s.FName, 
  s.LName, s.Gender, s.BirthDate, s.Email, 
  r.HallPref1, r.HallPref2, r.HallPref3
FROM
  dbo.StudentSignUp AS s 
  INNER JOIN RoomSignUp.dbo.Incoming_Applications_Current AS r 
    ON s.StudentID = r.StudentID 
  INNER JOIN HallData.dbo.Halls AS h 
    ON r.HallPref1 = h.HallID
 -->

    <section id="about">
      <div class="container">
        <div class="row">
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
echo "<table style='width:100%'>";
echo "<tr>";
echo "<th style='color:blue'>Book Name</th>";
echo "<th style='color:blue'>ISBN</th>";
echo "<th style='color:blue'>Category</th>";
echo "<th style='color:blue'>Copy</th>";
echo "<th style='color:blue'>Authors</th>";
echo "<th style='color:blue'>Date</th>";
echo "<th style='color:blue'>Member email</th>";
echo "</tr>";

while ($row = mysql_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row["bookName"]."</td>";
echo "<td>".$row["ISBN"]."</td>";
echo "<td>".$row["categoryName"]."</td>";
echo "<td>".$row["copy"]."</td>";
echo "<td>".$row["authors"]."</td>";
echo "<td>".$row["date"]."</td>";
echo "<td>".$row["memberName"]."</td>";
echo "</tr>";
}
echo "</table>";
mysql_close($database);
exit;
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
