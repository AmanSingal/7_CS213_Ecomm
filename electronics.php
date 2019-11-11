
<?php

include('config.php');
/*if($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['Add to cart'])){
  $name=$_POST['name'];
  echo $name;
}}*/

$useremail=$_SESSION['emailid'];
$query = "SELECT * FROM electronics";

  $statement = $connect->prepare($query);
  $statement->execute();
  /*  array(
   ':user_email' => $_POST['useremail']
  )*/
  echo '<div class="jumbotron">
  <div class="container">
<!-- Site name -->
        <a class="nav-link text-center" href="./signin.php"><h3>Team 7.kart
        </h3>
      </a>
      <h3><p class="text-center text-danger">Electronics</p></h3>
</div>
</div>';
   $no_of_row = $statement->rowCount();
/*$result = $con->query($query);*/
for ($i=0; $i < $no_of_row ; $i++) { 
  if(isset($_POST[$i])){
    $choice=$i;
    $choice=$choice+1;
    $_SESSION['choice']=$choice;

      $sql4="select * from electronics where rownumber='".$choice."' limit 1";
  $statement4 = $connect->prepare($sql4);
  $statement4->execute();

  $row_4=$statement4->fetch();
  $productname=$row_4[1];
  $companyname=$row_4[2];

  $price = $row_4[6];
/*  $userrole = $row_1[7];
*/
  $insert_query1 = "
  INSERT INTO cart
  ( useremail, productname,price,companyname) 
  VALUES ('$useremail', '$productname','$price','$companyname')";
   $statement2 = $connect->prepare($insert_query1);
  $statement2->execute(
   array(
    ':useremail'   => '$useremail',
    ':productname'   => '$productname',
        ':price'   => '$price',
    ':companyname'   => '$companyname',

   )
  );

    header("Location: ./addtocart.php");
  }
}
/*$rows = $result->num_rows;
*/echo '<div class="card-deck mt-4">';
for ($j = 0 ; $j < $no_of_row ; ++$j)
{
$row=$statement->fetch();

        echo  '<div class="col-sm-4">';
        echo '<div class="card" >';
        echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row[5] ).'"
        alt="Card image cap">'   ;
        
        echo '<div class="card-body">';
        echo '<h3 class="card-title"><p class="bg-light text-dark">';
        echo $row[2];
        echo "</br>";
        
        echo'</p></h3>';
        echo $row[1];
        echo "</br>";
        echo "Features -- $row[3]";
        echo "</br>";
        echo "Price -- $row[6]";
/*        echo '<p class="card-text"><p class="bg-light text-dark">No orders to show</p>';*/
        echo '<div class="form-group">';
        echo '<form method="post" action="./electronics.php">';
        echo '<p class="txt txt-success"><a href="./addtocart.php"><input type="submit" name='.$j.' value="Add to Cart" id="add"></a></p>';
        echo '</form>';
        echo '<hr/>';
/*        $_SESSION['choice']=$j;
*/        echo '<a href="./buy.php"><input type="button" name="Buy Now" value="BuyNow" id="buy"></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
}
echo '</div>'; 

function get_post($con, $var)
{
return $con->real_escape_string($_POST[$var]);
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