<?php
require_once('classes/database.php');
$con = new database();

if (empty($_POST['id'])) {
    header('location:index.php');

}else {
    $id = $_POST['id'];
    $data =$con->viewdata($id);
}





if (isset($_POST['update'])) {
    //User Information

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['c_pass'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];

// Address Information

    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $User_Id = $_POST['id'];

    if($password==$confirm) {
        if ($con->updateUser($User_Id, $username,$password,$firstname, $lastname, $birthday, $sex)) {
        if ($con->updateUserAddress($User_Id,$street, $barangay, $city,$province )) {
                header('location:index.php');
                exit();
    }else{
        $error ="Error occured while updating user address. Please try again.";
    }
    }else{
        $error = "Error occured while updating user information. Please try again.";
            }
        }
    }   

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Page</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    .custom-container{
        width: 800px;
    }
    body{
    font-family: 'Roboto', sans-serif;
    }
  </style>

</head>
<body>

<div class="container custom-container rounded-3 shadow my-5 p-3 px-5">
  <h3 class="text-center mt-4"> Update Information</h3>
  <form method="post">
    <!-- Personal Information -->
    <div class="card mt-4">
      <div class="card-header bg-info text-white">Personal Information</div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6 col-sm-12">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Enter first name" value="<?php echo $data ['firstname'] ?>">
          </div>
          <div class="form-group col-md-6 col-sm-12">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Enter last name" value="<?php echo $data ['lastname'] ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $data ['birthday'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="sex">Sex:</label>
            <select class="form-control" id="sex" name="sex" value="<?php echo $data ['sex'] ?>">
              <option selected>Select Sex</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $data ['username'] ?>">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $data ['password'] ?>">
        </div>
        <div class="form-group">
          <label for="password">Confirm Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Confirm password" name="c_pass" value="<?php echo $data ['password'] ?>">
        </div>
      </div>
    </div>
    
    <!-- Address Information -->
    <div class="card mt-4">
      <div class="card-header bg-info text-white">Address Information</div>
      <div class="card-body">
        <div class="form-group">
          <label for="street">Street:</label>
          <input type="text" class="form-control" id="street" placeholder="Enter street" name="street" value="<?php echo $data ['street'] ?>">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="barangay">Barangay:</label>
            <input type="text" class="form-control" id="barangay" placeholder="Enter barangay" name="barangay" value="<?php echo $data ['barangay'] ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="<?php echo $data ['city'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="province">Province:</label>
          <input type="text" class="form-control" id="province" placeholder="Enter province" name="province" value="<?php echo $data ['province'] ?>">
        </div>
      </div>
    </div>
    
    <!-- Submit Button -->
    
    <div class="container">
    <div class="row justify-content-center gx-0">
        <div class="col-lg-3 col-md-4"> 


           <input type="hidden" name="id" value="<?php echo $data['User_Id']; ?>">
           <input type="submit" name="update" class="btn btn-outline-primary btn-block mt-4" value="Update">
        </div>
        <div class="col-lg-3 col-md-4"> 
            <a class="btn btn-outline-danger btn-block mt-4" href="login.php">Go Back</a>
        </div>
    </div>
</div>


  </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<!-- Bootsrap JS na nagpapagana ng danger alert natin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>