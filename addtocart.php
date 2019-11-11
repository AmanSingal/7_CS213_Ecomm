<?php
	include ('config.php');
	$choice=$_SESSION['choice'];
	$useremail=$_SESSION['emailid'];
	$sql5="select * from cart where useremail='".$useremail."' ";
  $statement5 = $connect->prepare($sql5);
  $statement5->execute();
/*  $row_11=$statement5->fetch();
  $username=$row_11[1];*/
  echo '<div class="jumbotron">
  <div class="container">
<!-- Site name -->
        <a class="nav-link text-center" href="./signin.php"><h3>Team 7.kart
        </h3>
      </a>
      <h3><p class="text-center text-danger">Your Cart, '.$useremail.'</p></h3>
</div>
</div>';

    $no_of_row5 = $statement5->rowCount();


    for ($j = 0 ; $j < $no_of_row5 ; $j++)
{
		  $row_5=$statement5->fetch();
  		  $productname = $row_5[1];
  		  $sql7="select * from electronics where productname='".$productname."'";
  $statement7 = $connect->prepare($sql7);
  $statement7->execute();
 $row_7=$statement7->fetch();
        echo  '<div class="col-sm-4">';
        echo '<div class="card" >';
        echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row_7[5] ).'"
        alt="Card image cap">'   ;
        
        echo '<div class="card-body">';
        echo '<h3 class="card-title"><p class="bg-light text-dark">';
        echo $row_7[2];
        echo "</br>";
        
        echo'</p></h3>';
        echo $row_7[1];
        echo "</br>";
        echo "Features -- $row_7[3]";
        echo "</br>";
        echo "Price -- $row_7[6]";
/*        echo '<p class="card-text"><p class="bg-light text-dark">No orders to show</p>';*/
        echo '<div class="form-group">';
        /*echo '<form method="post" action="./electronics.php">';
        echo '<p class="txt txt-success"><a href="./addtocart.php"><input type="submit" name='.$j.' value="Add to Cart" id="add"></a></p>';
        echo '</form>';*/
        echo '<hr/>';
/*        $_SESSION['choice']=$j;
*/        echo '<a href="./buy.php"><input type="button" name="Buy Now" value="BuyNow" id="buy"></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
}
/*	echo $row_5[1];
	echo $choice;
	echo $useremail;*/
?>

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
</body>
</html>