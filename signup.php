<?php 

include('config.php');


if(isset($_SESSION['user_id']))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["register"]))
{


 $query = "
 SELECT * FROM userinfo 
 WHERE user_email = :user_email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':user_email' => $_POST['user_email']
  )
 );
 $no_of_row = $statement->rowCount();
 if($no_of_row > 0)
 {
  $message = '<label class="text-danger">Email Already Exits</label>';
 }
 else
 {
  $user_name=$_POST['user_name'];
  $user_email=$_POST['user_email'];
  $user_role=$_POST['user_role'];
  $user_password=$_POST['user_password'];
  $user_activation_code = md5(rand());
  $insert_query = "
  INSERT INTO userinfo 
  (user_name, user_email, user_password, user_activation_code, user_email_status,user_mobile_number,user_address,user_role) 
  VALUES (:user_name, :user_email, :user_password, :user_activation_code, :user_email_status, :user_mobile_number, :user_address, :user_role)
  ";



  $statement = $connect->prepare($insert_query);
  $statement->execute(
   array(
    ':user_name'   => $_POST['user_name'],
    ':user_email'   => $_POST['user_email'],
    ':user_password'  => $_POST['user_password'],
    ':user_activation_code' => $user_activation_code,
    ':user_email_status' => 'not verified',
    ':user_mobile_number'   => $_POST['user_mobile_number'],
    ':user_address'   => $_POST['user_address'],
    ':user_role'   => $_POST['user_role'],
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
   $base_url = "http://localhost/SSL Project/";
   $mail_body = "
   <p>Hi ".$_POST['user_name'].",</p>
   <p>Thanks for Registration. Your password is ".$user_password.", This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
   <p>Best Regards,<br />Team-7.kart</p>
   ";
   require './class/class.phpmailer.php';
   $mail = new PHPMailer;
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP
   $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
   $mail->Port = '465';        //Sets the default SMTP server port
   $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
   $mail->Username = '180030004@iitdh.ac.in';     //Sets SMTP username
   $mail->Password = '180030004@iitdh.ac.in';     //Sets SMTP password
   $mail->SMTPSecure = "ssl";       //Sets connection prefix. Options are "", "ssl" or "tls"
   $mail->From = '180030004@iitdh.ac.in';   //Sets the From email address for the message
   $mail->FromName = 'Team-7.kart';     //Sets the From name of the message
   $mail->AddAddress($_POST['user_email'], $_POST['user_name']);  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Email Verification';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
   }
  }


/*$activationcode=$user_activation_code;
$to=$user_email;
$msg= "Thanks for registering. Welcome to our family.";
$subject="Email verification (Team - 7.kart)";
$headers = "MIME-Version: 1.0"."\r\n";
$headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers = 'From : Team-7.kart | E-Comm Website'."\r\n";
$ms="<html></body><div><div>Dear $user_name,</div></br></br>";
$ms="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
<div style='padding-top:10px;'><a href='./email_verification.php?code=$activationcode'>Click Here</a></div>
<div style='padding-top:4px;'>Powered by <a href='./main.html'>Team-7.kart</a></div></div>
</body></html>";
mail($to,$subject,$ms,$headers);
echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";*/
// echo "<script>window.location = 'main.html';</script>";;

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
        <a class="nav-link text-center" href="./main.php"><h3>Team 7.kart
        </h3>
    	</a>
    	<h3><p class="text-center text-danger">SIGN UP</p></h3>
</div>
</div>

<!-- Login and Signup Page included with caveats-->

<!-- This section has info about username -->
<!-- Error Handling Part of these sections is still remaining -->
<div class="container">
	<div class="panel panel-default">
<form method="post" id="register_form" action="">
 		<?php echo $message; ?>
  
 <div class="form-group">
  <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Username
        <input type="text" class="form-control" name="user_name" placeholder="Username" aria-describedby="inputGroupPrepend" pattern="[a-zA-Z]+" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
   </div>

<!-- This section stores info about emailid and password of new user and displays error if something is not entered -->

  <div class="form-group">
    <div class="col-md-3 mb-3">
      <label for="validationCustom01">E-mail</label>
      <input type="text" class="form-control" id="validationCustom01" name="user_email" placeholder="E-mail" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
 <div class="col-md-4 mb-4">
      <label for="validationCustom02">Password</label>
      <input type="password" class="form-control" id="validationCustom02" placeholder="Make a strong password of atleast 8 chars" name="user_password" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  </div> 


<!-- Info about Mobile Number -->

  <div class="form-group">
    <div class="col-md-3 mb-3">
      <label for="validationCustom03">Mobile Number</label>
      <input type="number" class="form-control" id="validationCustom03" name="user_mobile_number" placeholder="Mobile Number" required>
      <div class="invalid-feedback">
        Please provide a valid mobile number
      </div>
    </div>
   </div>

<!-- Info about address -->
  <div class="form-group">
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Address</label>
      <input type="text" class="form-control" id="validationCustom04" name="user_address" placeholder="Address" required>
      <div class="invalid-feedback">
        Please provide a valid address.
      </div>
    </div>
  </div>

<!-- Option provided to a user to sign up as a buyer or a seller -->
  <div class="form-group">
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Sign Up As</label>
        <select name="user_role">
          <option value="">Select...</option>
          <option value="B">Buyer</option>
          <option value="S">Seller</option>
        </select>
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
<!-- Option is made necessary to register -->
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit" name="register" id="register">Submit form</button>
</form>
</div>
</div>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>