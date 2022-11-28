<?php
require 'config_reg.php';
if(isset($_POST["register"])){
  $username = $_POST["name"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  
  $area = $_POST["area"];
  $date = $_POST["date"];

  if(!empty($_POST['donergroup'])){
    $donergroup = $_POST['donergroup'];
  }

  if(!empty($_POST['district'])){
    $district = $_POST["district"];
  }

  $user = mysqli_query($conn, "SELECT * FROM tb_users WHERE  name='$username' OR email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo
    "
    <script> alert('Username/Email Has Already Taken'); </script>
    ";
  }
  else{
    $query = "INSERT INTO tb_users VALUES('$username', '$password', '$donergroup', '$email', '$contact', '$district', '$area', '$date')";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert('Registration Successful'); </script>
    ";
  }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="reg_style.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
  </head>
  <body>
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">PraDaxa</h2>
        </div>

        <div class="menu">
            <ul>
                <li><a href="Demo.php">HOME</a></li>
                <li><a href="Demo.php#aboutt">ABOUT</a></li>
                <li><a href="Demo.php#sectionn">SERVICE</a></li>
                <li><a href="doner_list.php">DONER LIST</a></li>
                <li><a href="reg_form.php">BE A DONER</a></li>
            </ul>
        </div>
    </div>
    <form class="" action="" method="post">
      <div class="title">
        <h2>REGISTER</h2>
      </div>
      <div class="half">
        <div class="item">
          <label for="">User Name</label>
          <input type="text" name="name" required value="">
        </div>
        <div class="item">
          <label for="">Password</label>
          <input type="text" name="password" required value="">
        </div>
      </div>
      <div class="full">
        <div class="item">
          <label for="">Doner Group</label>
          <select name="donergroup">
            <option value="" disabled selected><b>Select</b></option>
            <option value="A+ (A Positive)">A+ (A Positive)</option>
            <option value="A- (A Negative)">A- (A Negative)</option>
            <option value="B+ (B Positive)">B+ (B Positive)</option>
            <option value="B- (B Negative)">B- (B Negative)</option>
            <option value="AB+ (AB Positive)">AB+ (AB Positive)</option>
            <option value="AB- (AB Negative)">AB- (AB Negative)</option>
            <option value="O+ (O Positive)">O+ (O Positive)</option>
            <option value="O- (O Negative)">O- (O Negative)</option>
            
          </select>
        </div>
        </div>
        <div class="half">
        <div class="item">
          <label for="">Email</label>
          <input type="text" name="email" required value="">
        </div>
        <div class="item">
          <label for="">Contact</label>
          <input type="text" name="contact" required value="">
        </div>
        </div>
      <div class="full">
        <div class="item">
            <label for="">District</label>
            <select name="district">
              <option value="" disabled selected>Select</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Khulna">Khulna</option>
              <option value="Rangpur">Rangpur</option>
              <option value="Dhaka">Dhaka</option>
          </select>
          </div>
        <div class="item">
          <label for="">Area</label>
          <input type="text" name="area" required value="">
        </div>
        <div class="item">
          <label for="">Last Donation Date</label>
          <input type="text" name="date" required value="">
        </div>  
    </div>
      <div class="action">
        <input type="submit" name = "register" value = "REGISTER">
      </div>
    </form>
  </body>
</html>
