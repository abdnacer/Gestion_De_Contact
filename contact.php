<?php
  require_once 'function.php';
  $info = new Contact();
  $info->conn = Contact::connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

    <table class="container table tableaux">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">
            <button class="btn_contact p-2"><a href="Crud/creat_contact.php">Add</a></button>
          </th>
        </tr>
      </thead>
      <tbody>

        <?php 
          $result = $info->show($info->conn);
          foreach($result as $show_contacts) :?>
         <tr>
           <th scope="row"><?php echo $show_contacts['id'] ?></th>
           <td><?php echo $show_contacts['username'] ?></td>
           <td><?php echo $show_contacts['email'] ?></td>
           <td><?php echo $show_contacts['phone'] ?></td>
           <td><?php echo $show_contacts['address'] ?></td>
           <td class="d-flex fs-4 text-info border-0 text-end">
             <a href="Crud/update.php?edit=<?php echo $show_contacts['id']; ?>" class="edit_btn" ><i class="bi bi-pencil-square text-dark fs-3 me-3"></i></a>
             <a href="Crud/delete.php?delete=<?php echo $show_contacts['id']; ?>" class="del_btn"><i class="bi bi-archive-fill text-dark fs-3 me-3"></i></i></a>
           </td>
         </tr>
         <?php endforeach?>
      </tbody>
    </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>