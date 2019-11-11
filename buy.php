<?php
include ('config.php');

$useremail=$_SESSION['emailid'];


$sql5="select * from cardverify where user_email='".$useremail."' ";
  $statement5 = $connect->prepare($sql5);
  $statement5->execute();
  $no_of_row5 = $statement5->rowCount();
  if($no_of_row5 == 1){
  		  echo '<div class="jumbotron">
  <div class="container">
<!-- Site name -->
        <a class="nav-link text-center" href="./signin.php"><h3>Team 7.kart
        </h3>
      </a>
      <h3><p class="text-center text-danger">Payment Page, '.$useremail.'</p></h3>
</div>
</div>
	<form method="post">
	<h4><label>Enter Quantity To Be Bought</label>
	<input type ="number" name="quantity" placeholder=""></input>
	<hr/>
	<label>Enter Pin</label>
	<input type ="number" name="pin" placeholder=""></input>
	<input type="submit" name="buynow" value="Proceed"></input>
	</h4>
	</form>
';

	if(isset($_POST['buynow'])){
		$quantitydemanded=$_POST['quantity'];
		$pin=$_POST['pin'];
		$sql15="select * from cart where useremail='".$useremail."' ";
  $statement15 = $connect->prepare($sql15);
  $statement15->execute();
  $row15=$statement15->fetch();
  $productname=$row15[1];

  $sql17="select * from electronics where productname='".$productname."' ";
  $statement17 = $connect->prepare($sql17);
  $statement17->execute();
  $row17=$statement17->fetch();
  	$quantityavailable=$row17[4];
  	$costprice=$row17[6];
  	if($quantitydemanded>$quantityavailable){
  		echo "<script type='text/javascript'>alert('You have asked for products which exceed current inventory stock');</script>";
  	}
  	else{
  		$sql19="select * from payment where pin='".$pin."' ";
  $statement19 = $connect->prepare($sql19);
  $statement19->execute();
  $no_of_row19 = $statement19->rowCount();
    $row21=$statement19->fetch();
    $availablebalance=$row21[5];
  if($no_of_row19==1){
  	if($availablebalance>$costprice){
  	$quantityavailable = $quantityavailable -1;
  	$curr=$availablebalance-$costprice;
  	echo '<h3><p class="text text-success">Your payment is accepted</p></h3>';
  	echo '</br></br>';
  	echo '<h3><p class="text text-primary">Your current balance  is '.$curr.'</p></h3>';
/*  	$check1 = "UPDATE electronics SET quantity=:quantityavailable WHERE productname = :productname";
  	$stmt = $connect->prepare($check1);
  	$stmt->execute();*/
  }
  	else{
  		echo "<script type='text/javascript'>alert('Your balance is low');</script>";
  	}
  }
  else{
  	echo "<script type='text/javascript'>alert('Pin entered wrong');</script>";
  	exit();
  }
  	}

	}

  }
  else{

  	echo "<script type='text/javascript'>alert('Verify your payment method before buying');</script>";
  	exit();
  }

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