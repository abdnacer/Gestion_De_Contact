<?php
  // if(isset($_SESSION['Name'])){
  //   header("location: profil.php");
  // }
  require_once 'function.php';

  $login = new User();
  $login->conn = User::connect();
  $error = '';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
    $result = $login->login(
    $_POST["email"],
    hash('ripemd160', $_POST['password'])
    );
  }
  else{
    $error = "inputs can't be blank";
  }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
    <div class="parent">
      <div class="part1_form">
        <h1>Login</h1>
        <form method="POST" id="formSignin">
        <div class='fs-4 text-danger input_container'><?php echo $error;?></div>
          <div class="input_container">
            <label for="email">Email :</label>
            <input class="inpt" type="email" name="email" id="emailSignin">
            <div class="fs-6 text-danger errorEmail"></div>
          </div>
          <div class="input_container">
            <label for="password">Password :</label>
            <input class="inpt" type="password" name="password" id="passwordSignin">
            <div class="fs-6 text-danger errorPassword"></div>
          </div>
          <button type="submit" class="btn_signin" name="save">Sign in</button>
          <p class="para">No account? <a href="Signup.php">Sign up here.</a></p>
        </form>
      </div>
      <div class="part2_image">
        <img src="images/Sign_in.png" alt="Sign_in">
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
</body>
</html>