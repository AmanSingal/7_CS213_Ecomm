<?php 

include('config.php');

if(isset($_POST["register"])){
    $useremail=$_SESSION['emailid'];
    $productname=$_POST['productname'];
    $category=$_POST['category'];
/*    strtolower($category);
*/    /*echo $category;*/
    $companyname=$_POST['companyname'];
    $features=$_POST['features'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    if(isset($_FILES['image'])){
   
     $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
/*     echo $category;*/
          /*echo $category;*/
     $insert_query1 = "
  INSERT INTO ".$category."
  ( useremail, productname,companyname,features,quantity,image,price) 
  VALUES ('$useremail', '$productname','$companyname','$features','$quantity','$file','$price')";
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
    ':useremail'   => '$useremail',
    ':productname'   => '$productname',
    ':companyname'   => '$companyname',
    ':features'   => '$features',
    ':quantity'   => '$quantity',
    ':image'   => '$file',
    ':price'   => '$price',
   )
  );

    }
/*    echo file_get_contents($_FILES['image']['tmp_name']);
*/

  

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
    	<h3><p class="text-center text-danger">Add Product</p></h3>
</div>
</div>

<!-- Login and Signup Page included with caveats-->

<!-- This section has info about username -->
<!-- Error Handling Part of these sections is still remaining -->
<div class="container">
	<div class="panel panel-default">
<form method="post" id="register_form" action="" enctype="multipart/form-data">

  
 <div class="form-group">
  <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Product Name
        <input type="text" class="form-control" name="productname" placeholder="product name" aria-describedby="inputGroupPrepend" pattern="[a-zA-Z0-9]+" required>
        <div class="invalid-feedback">
          Please provide a product name.
        </div>
      </div>
   </div>

<!-- This section stores info about emailid and password of new user and displays error if something is not entered -->
<div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="validationCustom05">Categories</label>
        <select name="category">
          <option value="">Select...</option>
          <option value="electronics">Electronics</option>
          <option value="fashion">Fashion</option>
          <option value="sports">Sports</option>
        </select>
      </div>
    </div>
  </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
 <div class="col-md-4 mb-3">
      <label for="validationCustom02">Seller Company Name</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Your Company Name" name="companyname" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  </div> 
  <div class="col-md-4 mb-3">
      <label for="validationCustom02">Price</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Product Price in Rupee" name="price" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  </div> 
  <div class="col-md-4 mb-3">
      <label for="validationCustom02">Features</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Product Featues" name="features" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  </div> 
  <div class="col-md-4 mb-3">
      <label for="validationCustom02">Choose Product's Image </label>
      <input type="file"  id="validationCustom02" placeholder="Choose File.." name="image" value="image" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Quantity</label>
      <input type="number" class="form-control" id="validationCustom02" placeholder="Product Quantity" name="quantity" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  </div> 
  </div>
  <button class="btn btn-primary" type="submit" name="register" id="register">Submit form</button>
</form>
</div>
</div>

<script>
  $(document).ready(function()){
    $('#insert').click(function()){
      var image_name=$('#image').val();
      if(image_name == ''){
        alert("Please Select Image");
        return false;
      }
      else{
        var extension = $('#image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension,['gif'.'png','jpg','jpeg']) == -1){
          alert('Invalid Image File');
          $('#image').val('');
          return false;
        }
      }
    }

  }


</script>
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