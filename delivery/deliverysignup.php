<?php
include '../connection.php';
$msg = 0;

if (isset($_POST['sign'])) {
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $location = htmlspecialchars(strip_tags($_POST['district']));

    $allowed_locations = ['Vijayawada', 'Amaravati', 'Guntur'];
    if (!in_array($location, $allowed_locations)) {
        echo "<script>alert('Invalid location selected.');</script>";
        exit();
    }

    $pass = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $connection->prepare("SELECT * FROM delivery_persons WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Account already exists. Please log in.');</script>";
        echo "<script>window.location.href='deliverylogin.php';</script>";
        exit();
    } else {
        // Insert new record
        $stmt = $connection->prepare("INSERT INTO delivery_persons (name, email, password, city) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $pass, $location);
        if ($stmt->execute()) {
            echo "<script>alert('Account created successfully!');</script>";
            header("Location: delivery.php");
            exit();
        } else {
            echo "<script>alert('Failed to save data. Please try again.');</script>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="deliverycss.css">
  </head>
  <body>
    <div class="center">
      <h1>Register</h1>
      <form method="post" action=" ">
        <div class="txt_field">
          <input type="text" name="username" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required/>
            <span></span>
            <label>Email</label>
          </div>
          <div class="">
                           <!-- <label for="district">District:</label> -->
                           <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                          <option value="vijayawada">Vijayawada</option>
                          <!-- <option value="kancheepuram">Kancheepuram</option>
                          <option value="thiruvallur">Thiruvallur</option>
                          <option value="vellore">Vellore</option>
                          <option value="tiruvannamalai">Tiruvannamalai</option>
                          <option value="tiruvallur">Tiruvallur</option>
                          <option value="tiruppur">Tiruppur</option> -->
                          <option value="coimbatore">Coimbatore</option>
                          <!-- <option value="erode">Erode</option>
                          <option value="salem">Salem</option>
                          <option value="namakkal">Namakkal</option>
                          <option value="tiruchirappalli">Tiruchirappalli</option>
                          <option value="thanjavur">Thanjavur</option>
                          <option value="pudukkottai">Pudukkottai</option>
                          <option value="karur">Karur</option>
                          <option value="ariyalur">Ariyalur</option>
                          <option value="perambalur">Perambalur</option> -->
                          <option value="madurai" selected>Madurai</option>
                          <!-- <option value="virudhunagar">Virudhunagar</option>
                          <option value="dindigul">Dindigul</option>
                          <option value="ramanathapuram">Ramanathapuram</option>
                          <option value="sivaganga">Sivaganga</option>
                          <option value="thoothukkudi">Thoothukkudi</option>
                          <option value="tirunelveli">Tirunelveli</option>
                          <option value="tiruppur">Tiruppur</option>
                          <option value="tenkasi">Tenkasi</option>
                          <option value="kanniyakumari">Kanniyakumari</option> -->
                        </select> 
                        
          </div>
          <br>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" name="sign" value="Register">
        <div class="signup_link">
          Alredy a member? <a href="deliverylogin.php">Sigin</a>
        </div>
      </form>
    </div>

  </body>
</html>
