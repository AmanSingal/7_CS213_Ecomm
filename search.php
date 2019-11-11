<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./jumbotron.css">
  <title>
    Team-7.kart
  </title>


</head>
<body>


<div class="jumbotron">
	<div class="container">
<!-- Site name -->
        <a class="nav-link text-center" href="./main.php"><h3>Team 7.kart
        </h3>
    	</a>
    	<h3><p class="text-center text-danger">Your Searched item(s)</p></h3>
</div>
</div>
</body>
</html>

<?php
include('config.php');

// $con = new mysqli('localhost', 'root', '','users');



if(isset($_POST["search"])){
$search1=$_POST["search1"];
$search1=strtolower($search1);
$search2=$_POST["search1"];
$search2=strtolower($search2);

if(str_word_count("$search1") >1){
   
$search1=substr($search1,0,strpos($search1,' '));
$search2=substr($search1,strpos($search1,' '));
}

$query = "SELECT * FROM electronics where productname  like '%$search1%' or names like '%$search2%' ";

$statement = $connect->prepare($query);
  $statement->execute();


$rows = $statement->rowCount();
if($rows==0){
    echo "Your details are not matching. ";
   echo "</br>";
   echo "Go back to <a href='./main.php'>Team-7.kart</a> to try again.";
}
echo '<div class="card-deck mt-4">';
for ($j = 0 ; $j < $rows ; ++$j)
{
//$statement->data_seek($j);
$row = $statement->fetch();

      
        echo  '<div class="col-sm-4">';
        echo '<div class="card" >';
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[0] ).'"/>'   ;
        
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><p class="bg-light text-dark">Recent Orders</p></h5>';
        echo '<p class="card-text"><p class="bg-light text-dark">No orders to show</p>';
        echo '<div class="form-group">';
        echo '<input type="submit" name="Add to cart" value="Add to cart" id="add">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
       


 //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[0] ).'"/>';
// echo  $row[1];
// echo $row[2];
// echo $row[3];




}
echo '</div>'; 

}


?>