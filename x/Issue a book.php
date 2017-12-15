<?php
session_start();
if(!isset($_SESSION['lib'])){
header("location: signin.php");
}?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Issue a book</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="moreStyle.css">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

<!--  tables css -->
<link rel="stylesheet" type="text/css" href="table.css">

  </head>

  <body id="page-top">

   <!-- Navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="librarian.php"">Home Page</a> 
        <div id="submenu"> 
              <a class="navbar-brand js-scroll-trigger" href="#">Manage Books*</a>
              <div id="sublist">
              <a class="nav-link js-scroll-trigger" href="Issue a book.php">Issue A Book</a>
              <a class="nav-link js-scroll-trigger" href="#">Add New Book*</a>
              <a class="nav-link js-scroll-trigger" href="#">Delete Book*</a>
              <a class="nav-link js-scroll-trigger" href="#">Edit Book Information*</a>
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
<a class="navbar-brand js-scroll-trigger" href="#">Access Members*</a>


    <a class="nav-link js-scroll-trigger" href="signout.php"><img src="utilities.png" align="right" width="30px"class="ml" ></a>
    </nav> 
    
    <!-- Navigation -->




    <header class="bg-primary text-white">
      <div class="container text-center">
                               <h3>Issue Books To Members</h3>

      </div>
    </header>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
          <?php
          $database=mysql_connect("localhost","root","");
mysql_select_db("Library management system",$database);
    $strSQL = "SELECT * FROM issuedBook WHERE issued='0' ";
       $result = mysql_query($strSQL,$database);
            echo "<table id='tabl'>";
        echo "<tr>";
     echo "<th>Member Name</th>";
        echo "<th>issued date &nbsp;&nbsp;&nbsp;</th>";

        echo "<th>Book Name &nbsp;&nbsp;&nbsp;</th>";
        echo "<th>Copy &nbsp;&nbsp;&nbsp;</th>";
        echo "<th>Authors  &nbsp;&nbsp;&nbsp;</th>";
        echo "<th>ISBN  &nbsp;&nbsp;&nbsp;</th>";
        echo "<th>Category &nbsp;&nbsp;&nbsp;</th>";
        echo "<th>Number of copies</th>";
        echo "<th>ISSUE</th>"; 
        echo "</tr>";
                            echo "<form method='post' action='issue.php'>";

                
               while ($row = mysql_fetch_assoc($result)) {
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
            echo "<td><input style='display:block;'type='checkbox' name='issuedBooks[]' value=".$row['id'].">issue<br></td>";

             echo "</tr>";
        }
              echo "</table>";
    echo"<br>";
             echo "<input class='btn btn-primary'  type='submit' name='SS' value='issue all selected'>";
                    echo "</form>";


    
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
