<?php
  require_once 'function.php';
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
  <div class="profil">
    <div class="bg_profil">
      <img src="images/profil.jpg" alt="">
    </div>
    <div class="nav_profil">
      <div class="nom_profil d-flex">
        <p class="text-capitalize"><?php echo $_SESSION['name']." ".$_SESSION['prenom'];?></p>
      </div>
      <div class="link_profil">
        <a class="text-capitalize" href="profil.php"><?php echo $_SESSION['name'] ?></a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>

    <div class="content">
      <div class="title_content">
        <h1>Your Profile :</h1>
      </div>
      <div class="info_profil">
        <p class="text-capitalize">Username : <?php echo $_SESSION['name'] . " " . $_SESSION['prenom'];?></p>
        <p>Signup date : <?php echo $_SESSION['created']?></p>
        <p>Sigin date : Monday, 08 April 2019 14:24:20</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>