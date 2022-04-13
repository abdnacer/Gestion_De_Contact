<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "gestion_contact";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
  public function connect(){
    try {
      return mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    } catch (Throwable $th) {
      return null;
    }
  }
}


class User extends Connection{
  public function register($name, $prenom, $email, $password){
    $user = mysqli_query($this->conn, "SELECT * from `register_contact` Where email = '$email'");
    if(mysqli_num_rows($user) != 0){
      $this->conn->close();
      throw new Exception("user all ready existe");
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
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['created'] = $row['created'];
        // $this->id = $row["id"];
        if(isset($_POST['checkcookie'])){
          setcookie('email', $row['email'], time() + 30); //60 * 60 * 24
        }
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

  public static function show($id){
    if($id == 0){
      $show = mysqli_query($this->conn, "SELECT * from `contacts`");
    }
    else{
      $show = mysqli_query($this->conn, "SELECT * from `contacts` AND id= $id");
    }
    $result = [];
    while($row = mysqli_fetch_assoc($show)) {
      array_push($result, $row);
    }
    return $result;
  }

  public static function update($id, $username, $email, $phone, $address){
    return mysqli_query($this->conn, "UPDATE contacts SET 
      username = $username,
      email = $email,
      phone = $phone, 
      address = $address
      WHERE id = $id 
    ");
      }
}


















// class showContacts extends Connection{
//     public function show($id, $username, $email, $phone, $address){
//     $show = mysqli_query($this->conn, "SELECT * from `contacts`");
//     $result = mysqli_fetch_array($show)
//     return $result;
//   }
// }













// class showContacts extends Connection{
//   $show = mysqli_query($this->conn, "SELECT * from `contacts`");
//   $result = mysqli_fetch_array($show)
//   $id = $result['id'];
//   $username = $result['username'];
//   $email = $result['email'];
//   $phone = $result['phone'];
//   $address = $result['address'];
//   public function show($id, $username, $email, $phone, $address)
// }













// class selectData($db_table, $column) extends Connection{
//   $sql = "SELECT * FROM " . $db_table . " ORDER BY " . $column;
//   $sql = $this->mysqli->query($sql);
//   return = $sql;
// }

// function insertData($value1, $value2, $value3, $value4) extends Connection{
//   $this->db_connect();
//   $sql = sprintf(
//         "INSERT INTO contacts (username, email, phone, address) VALUES ('%s', '%s', '%s', '%s')",
//         $this->mysqli->real_escape_string($value1),
//         $this->mysqli->real_escape_string($value2)
//     );
//   $sql = $this->mysqli->query($sql);

//   if($sql === true) {
//       return $sql;
//   } else {
//       return "FAILED to execute INSERT query";
//   }
// }