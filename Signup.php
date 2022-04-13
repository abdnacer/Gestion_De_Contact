<?php
  require_once 'function.php';
  $register = new User();
  $erroremail = "";
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
      $erroremail = 'email incorect';
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
      <h1 id="title">Sign_up</h1>
      <!-- autocomplete="off/on" -->
      <form action="" method="post" >
      <div class='fs-4 text-danger input_container mb-4 mt-4'><?php echo $erroremail;?></div>
        <!-- <div class=" input_container bg-light text-danger w-50 d-flex justify-content-center align-items-center py-2 fs-4 mb-4 border border-danger rounded-3">gvhjk</div> -->
        <div class="input_container">
          <label for="name">Name :</label>
          <input class="inpt" id="name" type="text" name="name">
        </div>
        <div class="input_container">
          <label for="prenom">Prenom :</label>
          <input class="inpt" id="prenom" type="text" name="prenom">
        </div>
        <div class="input_container">
          <label for="email">Email :</label>
          <input class="inpt" id="email" type="email" name="email">
        </div>
        <div class="input_container">
          <label for="password">Password :</label>
          <input class="inpt" id="password" type="password" name="password">
        </div>
        <button type="submit" class="btn_signin" name="save">Sign up</button>
        <p class="para">Already have an account?<a href="index.php">Login here.</a></p>
      </form>
    </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>