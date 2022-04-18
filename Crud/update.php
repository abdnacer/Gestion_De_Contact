<?php
  require_once '../function.php';

  if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $user = Contact::show(Contact::connect(), $_GET['edit']);
  }
  else{
    Contact::update(Contact::connect(),$_POST['id'], $_POST['username'], $_POST['email'], $_POST['phone'], $_POST['address']);
    header('location: ../contact.php'); 
    exit();
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
      <input type="hidden" name="id" value="<?php echo $_GET['edit']?>">
      <!-- <button onclick="close_Course()" class="btnclose"><i class="bi bi-x-circle fs-4"></i></button> -->
      <div class="title_contact">
        <h1>Created Contact</h1> 
      </div>
      
      <div class="inpt_contact">
        <label for="username">Username :</label>
        <input type="username" name="username" value="<?php echo $user[0]['username'] ?>">
      </div>

      <div class="inpt_contact">
        <label for="email">Email :</label>
        <input type="email" name="email" value="<?php echo $user[0]['email'] ?>">
      </div>

      <div class="inpt_contact">
        <label for="phone">Phone :</label>
        <input type="phone" name="phone" value="<?php echo $user[0]['phone'] ?>">
      </div>

      <div class="inpt_contact">
        <label for="address">Address :</label>
        <input type="address" name="address" value="<?php echo $user[0]['address'] ?>">
      </div>
      <div class="sbt_contact">
        <a href="../contact.php" class="btn btn-secondary" type="submit">Cancel</a>
        <button class="btn btn-dark" type="submit" name="edit" >edit Contact</button>
      </div>
    </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>