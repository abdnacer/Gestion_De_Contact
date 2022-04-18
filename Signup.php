<?php
  require_once 'function.php';
  $register = new User();
  $register->conn = Contact::connect();
  $error = "";
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST["name"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
      $result = $register->register(
        $_POST["name"],
        $_POST["prenom"],
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
    <div class="part2_image">
      <img src="images/Sign_up.png" alt="Sign_in">
    </div>
    <div class="part1_form">
      <h1 id="title">Sign up</h1>
      <!-- autocomplete="off/on" -->
      <form id="formSignup" action="" method="post" >
      <div class='fs-4 text-danger input_container'><?php echo $error;?></div>
        <div class="input_container">
          <label for="name">Name :</label>
          <input class="inpt" id="nameSignup" type="text" name="name">
          <div class="fs-6 text-danger errorName"></div>
        </div>
        <div class="input_container">
          <label for="prenom">Prenom :</label>
          <input class="inpt" id="prenomSignup" type="text" name="prenom">
          <div class="fs-6 text-danger errorPrenom"></div>
        </div>
        <div class="input_container">
          <label for="email">Email :</label>
          <input class="inpt" id="emailSignup" type="email" name="email">
          <div class="fs-6 text-danger errorEmail"></div>
        </div>
        <div class="input_container">
          <label for="password">Password :</label>
          <input class="inpt" id="passwordSignup" type="password" name="password">
          <div class="fs-6 text-danger errorPassword"></div>
        </div>
        <button type="submit" class="btn_signin" name="save">Sign up</button>
        <p class="para">Already have an account?<a href="index.php">Login here.</a></p>
      </form>
    </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>