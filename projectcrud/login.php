<?php 

if (isset($_POST['submit'])) {
   include('koneksi.php');

   switch ($_POST["tipe"]) {
      case 'daftar':
         $hashed_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
         $username = $_POST['email'];
         $sql = "INSERT INTO users (email, password) VALUES ('$username', '$hashed_pass')";

         if (mysqli_query($koneksi, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
          }
         break;
      
         case 'login':
            $username = $_POST["email"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM users WHERE email = '$username'";

            $result = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($result) > 0) {
               $row = mysqli_fetch_assoc($result);
               $verified = password_verify($password, $row['password']);
               if($verified){
                  session_start();
                  $_SESSION["is_login"] = true;
                  header('Location: http://localhost/projectcrud/');
               }
            } else {
            echo "0 results";
            }
         break;
   }
   die();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>CRUD ADINDA</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Form Login
            </div>
            <div class="title signup">
               Form Registrasi
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Registrasi</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login" method="POST">
                  <div class="field">
                     <input type="text" placeholder="Masukan Email" required name="email">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Masukan Password" required name="password">
                  </div>
                  <input type="text" name="tipe" value="login" hidden> 
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login" name="submit">
                  </div>
                  <div class="signup-link">
                     Belum Punya Akun? <a href="">Daftar Sekarang</a>
                  </div>
               </form>
               <form action="#" class="signup" method="POST" value="submit">
                  <div class="field">
                     <input type="text" placeholder="Masukan Email" name="email" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Masukan Password" name="password" required>
                  </div>
                  <input type="text" name="tipe" value="daftar" hidden> 
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Sign Up" name="submit">
                  </div>
                  <div class="signup-link">
                     Sudah Punya Akun? <a href="">Login Sekarang</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>