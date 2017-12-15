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

    <title>extend due date</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
       <!-- My style -->
<link rel="stylesheet" type="text/css" href="moreStyle.css">

<style>
#button {
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 8px 15px;
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


    <a class="nav-link js-scroll-trigger" href="signout.php"><img src="utilities.png" align="right" width="30px"class="ml" ></a>
    </nav> 
    
    <!-- Navigation -->
 
    <header class="bg-primary text-white">
      <div class="container text-center">
           <h1>Extend due date for an issued book</h1>  

      </div>
    </header>
 
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
                    
  <br>
  <br>
  <br>
        <label><h5>Select Book To Extend:</h5></label>
        <br>
        
        <?php 
        $database=mysql_connect("localhost","root","");
$sdb=mysql_select_db("Library management system",$database);
$name=$_SESSION['member'];
        $result = mysql_query("SELECT ISBN FROM issuedBook WHERE memberName ='$name' AND issued='1'");
        echo '<form class="form-signin" action="#" method="post">' ;  

        echo '<select name="books">';
              while($row = mysql_fetch_assoc($result)){
               $rs=mysql_query("SELECT * FROM Book WHERE ISBN='".$row['ISBN']."'");
                           $row2=mysql_fetch_assoc($rs);
        echo "<option value=".$row2['ISBN'].">". $row2['bookName']."</option> "."<br><br>";}
 
 echo '<br><br><input id="button" name="sb" type="submit" value="Ok">';
   echo "</form>";
echo "<div><br><br>";
echo "<h5>Extend the due date by:</h5>";
echo "<br><input style='display:inline;' type='radio' name='time' value='7'><label><h4>One weeks</h4></label><br><br>";   
echo "<input style='display:inline;' type='radio' name='time' value='14'><label><h4>Two weeks</h4></label><br><br>";   
echo "<input style='display:inline;' type='radio' name='time' value='30'><label><h4>One Month</h4></label><br><br>";   
echo "</div>";        




  
    
    if(isset($_POST['sb'])){
$result = mysql_query("SELECT date FROM issuedBook WHERE memberName='".$_SESSION['member']."' AND ISBN='".$_POST['books']."'");
$row=mysql_fetch_array($result);
$date = $row['date'];  
$date = strtotime($date);
$num=$_POST['time'];
$date = strtotime("+".$num." day", $date);
echo "$date";
$date=date('Y/m/d', $date);
$result = mysql_query("UPDATE  issuedBook SET date='$date' WHERE memberName='".$_SESSION['member']."' AND ISBN='".$_POST['books']."'");
    }
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