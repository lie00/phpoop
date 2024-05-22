<?php
 
 require_once('classes/database.php');
 $con=new database();

 $error = "";
  if(isset($_POST["signup"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $firstname= $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $sex= $_POST['sex'];
    

    if($password==$confirm) {
        if ($con->signup($username,$password,$firstname, $lastname, $birthday, $sex)) {
            header('location:login.php');
    }else{
        $error_message ="Username already exists.Please Choose
        a diffent username.";
    }
}else{
    $error_message = "Password did not match";
}

  }
 ?>
 
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
    
<div class="container-fluid login-container rounded shadow">
  <h2 class="text-center mb-4">Register Now</h2>

  <form method="post">
  <div class="form-group">
      <label for="firstname">First Name:</label>
      <input required type="text" class="form-control" name="firstname" placeholder="Enter First Name">
    </div>
  <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input required type="text" class="form-control" name="lastname" placeholder="Enter Last Name">
    </div>
    <div class="mb-3">
      <label for="birthday" class="form-label">Birthday:</label>
      <input required type="date" class="form-control" name="birthday">
    </div>
    <div class="mb-3">
      <label for="sex" class="form-label">Gender:</label>
      <select required class="form-select" name="sex">
        <option selected disabled>Select Sex</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>


    <div class="form-group">
      <label for="Username">Username:</label>
      <input required type="text" class="form-control" name="username" placeholder="Enter username">
    </div>
    <div class="form-group">
      <label for="User_pass">Password:</label>
      <input required type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="User_pass">Confirm Password:</label>
      <input required type="password" class="form-control" name="confirm" placeholder="Enter password">
    </div>

    <?php if (!empty($error_message)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error_message; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
        <input type="submit" class="btn btn-danger btn-block" value="Sign-Up" name="signup">

</div>
    
  </form>
</div>



<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>


 

