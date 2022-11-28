<?php
require 'config_reg.php';
if(isset($_POST["register"])){
  $username = $_POST["User_name"];
  $password = $_POST["Password"];
  $donergroup = $_POST["Doner_Group"];
  $email = $_POST["Email"];
  $contact = $_POST["Contact"];
  $district = $_POST["District"];
  $area = $_POST["Area"];
  $date = $_POST["Last_donation_date"];

  $user = mysqli_query($conn, "SELECT * FROM tb_users WHERE User_name = '$username' OR Email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo
    "
    <script> alert('Username/Email Has Already Taken'); </script>
    ";
  }
  else{
    $query = "INSERT INTO tb_users VALUES('', '$username', '$password', '$donergroup', '$email', '$contact', '$district', '$area', '$date')";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert('Registration Successful'); </script>
    ";
  }
}
?>
