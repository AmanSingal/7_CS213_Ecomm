<?php
  include('config.php');
  $user_email=$_SESSION['emailid'];
  $user_pass=$_SESSION['pass'];


  $sql="select * from userinfo where user_email='".$user_email."'AND user_password='".$user_pass."' limit 1";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $row_1=$statement->fetch();
  $username = $row_1[0];
  $useremail=$row_1[1];
  $userpassword=$row_1[2];
  $usermobileno = $row_1[5];
  $useraddress = $row_1[6];
  $userrole = $row_1[7];

  if(isset($_POST["paymentoption"])){
  	$nameoncard=$_POST['nameoncard'];
  	$cardno=$_POST['cardno'];
  	$validity=$_POST['validity'];
  	$cvv=$_POST['cvv'];
  	$sql1="select * from payment where nameoncard='".$nameoncard."'AND cardno='".$cardno."'AND validity='".$validity."'AND cvv='".$cvv."' limit 1";
  $statement1 = $connect->prepare($sql1);
  $statement1->execute();

  $no_of_row1 = $statement1->rowCount();
   if(!($no_of_row1==1)){
   	echo "<script type='text/javascript'>alert('Your card Details are wrong. Try again');</script>";
/*   echo "Your card details are wrong.";
  echo "</br>";
  echo "Go back to <a href='./profile.php'>Profile</a> to try again.";*/
/*    session_destroy();
    unset($_SESSION['emailid']);
    unset($_SESSION['pass']);
    exit();*/

}
else{
/*  $row=$statement->fetchAll(PDO::FETCH_COLUMN, 0);
  $username = $row[0];*/
  $status="verified";
  $insert_query1 = "
  INSERT INTO cardverify 
  ( user_email, user_email_verification) 
  VALUES ('$useremail', 'verified')";
/*    $statement2 = $connect->prepare($insert_query1);
  $statement2->execute(
   array(
    ':user_email'   => $user_email,
    ':user_email_verification' => "verified",
   )
  );*/
   $statement2 = $connect->prepare($insert_query1);
  $statement2->execute(
   array(
    ':user_email'   => '$useremail',
    ':user_email_verification' => 'verified',
   )
  );
}

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

<div class="jumbotron">
	<div class="container">
<!-- Site name -->
        <a class="nav-link text-center" href="./signin.php"><h3>Team 7.kart
        </h3>
    	</a>
    	<h3><p class="text-center text-danger">Profile</p></h3>
</div>
</div>

<!-- This section displays the user profile options -->
	
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                    	<?php
                                        echo $username;
                                        ?></h2>
                                    
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
<!--                                     <li class="nav-item">
                                        <a class="nav-link" id="payment" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payment Details</a>
                                    </li> -->
<!--                                     <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="addproduct.php" role="tab" aria-controls="connectedServices" aria-selected="false"><?php
/*                                        if($userrole == "S"){
*/                                        	// echo "Add Product";
                                        
                                        ?></a>
                                    </li> -->
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php
                                                echo $username;
                                                ?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">User-email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php
                                                echo $useremail;
                                                ?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Mobile Number</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php
                                                echo $usermobileno;
                                                ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Address</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php
                                                echo $useraddress;?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Role</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php
                                                echo $userrole;?>
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php echo "</br></br></br>";?>
        <?php
        $sql6="select * from cardverify where user_email='".$useremail."' limit 1";
  $statement6 = $connect->prepare($sql6);
  $statement6->execute();

  $no_of_row6 = $statement6->rowCount();
   if(($no_of_row6==1)){
        echo '<p class="text text-primary"><h4>Available Balance</h4></p><form method="post">
        <input type="number" name="pin" placeholder="Enter Pin"></input>
        <input type="submit" name="amount"></input></form>';
        if(isset($_POST['amount'])){
          $pin=$_POST['pin'];
          $sql10="select * from payment where pin='".$pin."' limit 1";
  $statement10 = $connect->prepare($sql10);
  $statement10->execute();
        $row=$statement10->fetch();
        $avbalance=$row[5];
        echo '<h4>'.$avbalance.'</h4>';
          }
        }
        ?>
        <?php echo "</br></br></br>";?>
				<?php
                if($userrole == "S"){
               	echo '<p ><h3><a href="./addproduct.php"><input type="button" value="Add Product"></input></a></h3></p>';
               }
                  ?>           
	
<?php echo "</br></br></br>";?>
	<h3><p class="bg-light text-success">Enter your Payment Details To Verify</p></h3><?php echo "</br>"?>
	<?php
	$sql2="select * from cardverify where user_email='".$useremail."' limit 1";
  $statement3 = $connect->prepare($sql2);
  $statement3->execute();

  $no_of_row3 = $statement3->rowCount();
   if(($no_of_row3==1)){
   	echo '<h4><p class="text-danger">';
   	echo "Your card details are verified";
   	echo '</p></h4>';
   	exit();
   }
	?>
        <div class="container">
		<div class="panel panel-default">

		<form method="post" id="register_form" action="">

        <div class="form-group">
		  <div class="col-md-4 mb-3">
     	 <label for="validationCustomUsername">Name on Card
        <input type="text" class="form-control" name="nameoncard" placeholder="Name on Card" aria-describedby="inputGroupPrepend" pattern="[a-zA-Z0-9]+" required>
        <div class="invalid-feedback">
          Please choose a name on card.
        </div>
      </div>
   </div>


   	<div class="form-group">
		  <div class="col-md-4 mb-3">
     	 <label for="validationCustomUsername">Card Number
        <input type="number" class="form-control" name="cardno" placeholder="Card Number" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a card number.
        </div>
      </div>
   </div>

   <div class="form-group">
		  <div class="col-md-4 mb-3">
     	 <label for="validationCustomUsername">Expiry Date
        <input type="date" class="form-control" name="validity" placeholder="Validity" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose an expiry date.
        </div>
      </div>
   </div>

   <div class="form-group">
		  <div class="col-md-4 mb-3">
     	 <label for="validationCustomUsername">CVV
        <input type="number" class="form-control" name="cvv" placeholder="CVV" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a cvv.
        </div>
      </div>
   </div>
   	<input type="submit" name="paymentoption" value="Verify"></input>
<!--    <div class="form-group">
		  <div class="col-md-4 mb-3">
     	 <label for="validationCustomUsername">
        <input type="number" class="form-control" name="cvv" placeholder="CVV" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a cvv.
        </div>
      </div>
   </div>
    -->
</div>
</div>
  	
</body>
</html>