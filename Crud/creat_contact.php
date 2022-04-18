<?php
  require_once '../function.php';
  $insert = new Contact();
  $insert->conn = Contact::connect();
  $erroremail = "";
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["address"])) {
      $id = $_SESSION['id'];
      $result = $insert->insert(
        $id,
        $_POST["username"],
        $_POST["email"],
        $_POST["phone"],
        $_POST['address']
      );
    }
    else{
      $erroremail = 'email incorect';
    }


    //VALIDATION
    // || !isset($_POST["prenom"]) || !isset($_POST["email"]) || !isset($_POST["password"])
    // if(empty($_POST["name"])) {
    //   $err = 'name is empty';
    // }
    //END VALIDATION

    
    // $result = $register->register(
    //   $_POST["name"],
    //   $_POST["prenom"],
    //   $_POST["email"],
    //   hash('ripemd160', $_POST['password'])
    // );
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Document</title>
</head>
<body>
  <div class="form_creat">
    <form action="" method="POST">
      <!-- <button onclick="close_Course()" class="btnclose"><i class="bi bi-x-circle fs-4"></i></button> -->
      <div class="title_contact">
        <h1>Created Contact</h1> 
      </div>
      
      <div class="inpt_contact">
        <label for="username">Username :</label>
        <input type="username" name="username">
      </div>

      <div class="inpt_contact">
        <label for="email">Email :</label>
        <input type="email" name="email">
      </div>

      <div class="inpt_contact">
        <label for="phone">Phone :</label>
        <input type="phone" name="phone">
      </div>

      <div class="inpt_contact">
        <label for="address">Address :</label>
        <input type="address" name="address">
      </div>
      <div class="sbt_contact">
        <a href="../contact.php" class="btn btn-secondary" type="save" name="save">Cancel</a>
        <button type="save" class="btn btn-dark" name="save" >Creat Contact</button>
      </div>
      
    </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>