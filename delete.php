<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <style>
.c3{
    text-emphasis: none;
    text-align: right;
    color: white;

}
a{
    color: black;
    text-emphasis: none;
    text-decoration: none;

}
H1{
    text-align:center;
    background-color:black;
    color:red;
}
body{
    background-color:lightblue;

}
.cd{
            text-align: right;
        }


        


.button1 {
  background-color: #00fffb;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
.button1:hover {opacity: 1}
.button3 {
  background-color:#14a76c ;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
.button3:hover {opacity: 1}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
    </head>
    <body>
    <nav class="navbar navbar-light bg-dark ">
        <span class="navbar-brand mb-0 h1 text-white ml-auto mr-auto"><h2>DELETION OF DATA</h2></span>
        
  <div class="c3"><button class=" button1"><a href="home3.php">Go Back</a></button></div>
<div class="cd">
        <button class=" button1"><a href="Logout.php">Logout</a></button>
    </div>
    </nav>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="insert.php">Insert</a>
  <a href="update.php">Update</a>
  <a href="find3.php">Retrieve</a>
  <a href="analysis.php">Analysis</a>
  <a href="analysiss2.php">Analysis-2nd Stage</a>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
    <h5>Note: Deletion will be based on the university rank</h5>

    <form action="" method="post">
      <h5>Enter Rank of the university:  <input type="number" name="n" id="n"></h5> 
        <br>
        <button type="submit" class=" button3">Enter</button>
    </form> 
    </body>    
</html>
<?php
session_start();
if( isset($_SESSION['username'])  ){
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once __DIR__ .'/vendor/autoload.php';
$con=new MongoDB\Client("mongodb://localhost:27017");
$n=(int)$_POST['n'];
$db= $con->NoSql;
$tbl=$db->project;
$res=$tbl->deleteOne([ "world_rank" => $n ]);

if($res){
    echo "<h1>The entered data is  successfully deleted from database!</h1><br>";
  }

$cursor = $tbl->find();
   // iterate cursor to display title of documents	
   foreach ($cursor as $document) {
      echo "<hr><b>Name of Institution:</b>".$document["institution"] .  ".<br><b>World Rank</b> ". $document["world_rank"] .  ".<br><b>National Rank</b> ".$document["national_rank"] .  ".<br><b>Year</b> ".$document["year"]."<hr>";

   }
}
}
else{
    session_unset();     // unset $_SESSION variable for the run-time
session_destroy();   // destroy session data in storage
header('Location:Home.html');
}
?>
