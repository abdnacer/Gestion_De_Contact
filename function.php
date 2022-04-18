<?php
session_start();

class Connection{
  public $conn;
  public static function connect(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "gestion_contact";
    return  mysqli_connect($host, $user, $password, $db_name);
  }
}

class User extends Connection{
  public function register($name, $prenom, $email, $password){
    $user = mysqli_query($this->conn, "SELECT * from `register_contact` Where email = '$email'");
    if(mysqli_num_rows($user) != 0){
      return $messageEm = "Retype a new email";
    }
    else{
      $sql = "INSERT INTO `register_contact`(name, prenom, email, password)
      VALUES ('$name', '$prenom', '$email', '$password')"; 

      if(!mysqli_query($this->conn, $sql)){
          die('impossible d’ajouter cet enregistrement : ' . mysqli_error());
      }
      $this->conn->close();

      echo "L’enregistrement est ajouté ";
      header('location: index.php'); 
      exit();
    }
  }

  public function login($email, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM register_contact WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) != 0){
      if($password == $row["password"]){
        $_SESSION['date'] = date("Y-m-d H:i:s", strtotime('-2 hours'));
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['created'] = $row['created'];
        // if(isset($_POST['checkcookie'])){
        //   setcookie('email', $row['email'], time() + 30); //60 * 60 * 24
        // }
        header('location: profil.php');
      }
      else{
        return 'password not correct';
      }
    }
  }
}

class Contact extends Connection{
  public function insert($id, $username, $email, $phone, $address){
    $user = mysqli_query($this->conn, "SELECT * from `contacts` Where email = '$email'");
    if(mysqli_num_rows($user) != 0){
      $this->conn->close();
      throw new Exception("user all ready existe");
    }
    else{
      $sql = "INSERT INTO `contacts`(id_user, username, email, phone, address)
      VALUES ('$id', '$username', '$email', '$phone', '$address')"; 

      if(!mysqli_query($this->conn, $sql)){
          die('impossible d’ajouter cet enregistrement : ' . mysqli_error());
      }
      $this->conn->close();

      echo "L’enregistrement est ajouté ";
      header('location: ../contact.php'); 
      exit();
    }
  }

  public static function show($conn,$id = 0){
    if($id == 0){
      $iduser = $_SESSION['id'];
      $show = mysqli_query($conn, "SELECT * from `contacts` WHERE id_user = '$iduser' ORDER BY id DESC ");
    }
    else{
      $show = mysqli_query($conn, "SELECT * from `contacts` WHERE id= '$id'");
    }
    $result = [];
    while($row = mysqli_fetch_assoc($show)) {
      array_push($result, $row);
    }
    return $result;
  }

  public static function update($conn,$id, $username, $email, $phone, $address){
    return mysqli_query($conn, "UPDATE contacts SET 
      username = '$username',
      email = '$email',
      phone = '$phone', 
      address = '$address'
      WHERE id = '$id' 
    ");
  }

  public static function delete($conn, $id){
    return mysqli_query($conn, "DELETE FROM contacts WHERE id = '$id'");
  }
}