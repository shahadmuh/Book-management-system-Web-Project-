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

    <title>Delete a book</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="moreStyle.css">

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
   
      </div>
    </header>
 
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
  <br>
  <br>
  <br>
        <?php
$database=mysql_connect("localhost","root","");
mysql_select_db("Library management system",$database);
    $strSQL = "SELECT * FROM category ORDER BY categoryName DESC";
       $rs = mysql_query($strSQL,$database);
    // Execute the query (the recordset $rs contains the result)
    
    // Loop the recordset $rs
   
// Each row will be made into an array ($row) using mysql_fetch_array
   echo "<form class='form-signin' action='' id='test' method='post'> ";
   
    echo"<h2>Select Catogary</h2>";
    while($row = mysql_fetch_array($rs)) {
      echo "<input type='radio' name='cate' value= ".$row["categoryName"]."> <label><h4>".$row["categoryName"]."</h4></label><br><br>";   

    }
     echo " <input id='button'";
     echo "type='submit' name='Submit' value='View Books'>";
     echo "</form>";
     echo"<br>";
     echo"<br>";
     
     echo "</form>";
    
    if(isset($_POST['Submit'])&&isset($_POST['cate'])){
        $categoryName=$_POST['cate'];
        $result = mysql_query("SELECT * FROM Book WHERE categoryName ='$categoryName'",$database);
        echo "<table id='tabl'>";
        echo "<tr>";
        echo "<th>Book Name</th>";
        echo "<th>Copy</th>";
        echo "<th>Authors</th>";
        echo "<th>ISBN</th>";
        echo "<th>Category</th>";
        echo "<th>Number of copies</th>";
         echo "<th>Delete</th>";
        echo "</tr>";
                    echo "<form method='post' action='deletBook.php'>";

        while ($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['bookName']."</td>";
            echo "<td>".$row['copy']."</td>";
            echo "<td>".$row['authors']."</td>";
            echo "<td>".$row['ISBN']."</td>";
            echo "<td>".$row['categoryName']."</td>";
            echo "<td>".$row['numOfCopies'] . "</td>";
            echo"<td><input type='checkbox' name='deletedBook[]' value=".$row['ISBN']."> Delete". "</td><br>";
            echo "</tr>";
        }

         echo "</table>";
         echo"<br>";
             echo " <input id='button' type='submit' name='SS' value='Delete Selected'>";

                    echo "</form>";
                    
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";


       }
    ?> 



<?php
// session_start();

if(!isset($_SESSION['lib'])){
header("location: signin.php");
}

$database=mysql_connect("localhost","root","");
$sdb=mysql_select_db("Library management system",$database);
if(isset($_POST['SS'])){
if(isset($_POST['deletedBook'])&&is_array($_POST['deletedBook'])){
foreach($_POST['deletedBook'] as $selectd){
$query="DELETE FROM Book WHERE ISBN='$selectd'";
 $result=mysql_query($query,$database);}

} mysql_close($database);
 header("location:deletBook.php");
}


?>
    
    
    
    
    
    <?php
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