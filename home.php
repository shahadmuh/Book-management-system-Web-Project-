<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}

</style>


    <title>Home</title>
   
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
       <!-- My style -->
<link rel="stylesheet" type="text/css" href="moreStyle.css">


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container" style='text-align: center;'>
       <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <li class="nav-item">
              <a class="navbar-brand js-scroll-trigger" href="signin.php">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand js-scroll-trigger" href="Signup.php">Sign up</a>
            </li>
          </ul>
      </div>
    </nav>

    <!-- Navigation -->

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>WELCOME TO LIBRARY MANAGEMENT SYSTEM</h1>
        </div>
    </header>

    <section class="container text-center">

                  <h1 style ='font-size:40px; ' id="join"> JOIN US</h1>


<div class="w3-content w3-section" style="max-width:700px">
  <img class="mySlides" src="books.jpg" style="width:700px">
  <img class="mySlides" src="istock_000075557797_small.jpg" style="width:700px">
  <img class="mySlides" src="https---blueprint-api-production.s3.amazonaws.com-uploads-card-image-539206-3310d58a-2b01-47db-a38a-e84a45987dd4.jpg" style="width:700px">
  <img class="mySlides" src="Book-Covers.jpg" style="width:700px">

</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>


    
    <h1>          about us </h1>
      <p>our library provide free services to our members, join us today and have acsess to 2000 free book!</p>
      <br><br><br><br><img src="img/page1_icon1.png" width="3%" class="img1 no_resize">
       <a href="mailto:librian@hotmail.com">Ask a Librarian</a>
    </section>

    

  
 



   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

    <script type="text/javascript">
      
function startJoinUs(){

  var test=setInterval(function() {updataText()},1000);
}
function updataText(){
var x=document.getElementById("join");
x.style.color=x.style.color=="blue"? "silver":"blue";

}

      window.addEevntlistener("load",startJoinUs(),false);
    </script>

  </body>

</html>
