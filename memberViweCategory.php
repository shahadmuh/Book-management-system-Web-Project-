<?php
session_start();
if(!isset($_SESSION['member'])){
header("location: signin.php");
}?>
<!DOCTYPE html>
<html lang="en">
 
 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view for member</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
       <!-- My style -->
<link rel="stylesheet" type="text/css" href="moreStyle.css">


<!--  tables css -->
<link rel="stylesheet" type="text/css" href="table.css">

  </head>

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
</style>
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
        echo "<th>Request</th>";
        echo "</tr>";
                    echo "<form method='post' action='requestBook.php'>";

        while ($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['bookName']."</td>";
            echo "<td>".$row['copy']."</td>";
            echo "<td>".$row['authors']."</td>";
            echo "<td>".$row['ISBN']."</td>";
            echo "<td>".$row['categoryName']."</td>";
            echo "<td>".$row['numOfCopies'] ."</td>"; 
            
            echo "<td>"."<input type='checkbox' name='requstedBook[]' value=".$row['ISBN']."> Request<br>"."</td>"; ;
            echo "</tr>";
        }
        
        echo "</table>";
        echo"<br>";
        echo"<br>";
        echo " <input id='button'  type='submit' name='SS' value='Send Request'>";
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

	</script>
    
    
    
    
    
    <?php
        mysql_close($database);
        exit;
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