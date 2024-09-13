<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];
   $admin_key = mysqli_real_escape_string($conn, $_POST['adminkey']);
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!!';
      }else{
         if($user_type == 'admin'){
            if($admin_key == 898345){
               mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
             $message[] = 'registered successfully!';
             header('location:login.php');
            }else{
               $message[] = 'WRONG ADMIN PLEASE GET THE RIGHT KEY FROM ADMIN';
               
            }
         }else{
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
            $message[] = 'registered successfully! ';
            header('location:login.php');
         }
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
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<style>

   .form-containers form{
      z-index: 1;
   }

  .form-containers {
  width: 100vw;
  height: 100vh;
  min-height: 350px;
  margin: 0;
  position: relative;
  background-color: #111;
  background-image: linear-gradient(to top, #222 5%, #111 6%, #111 7%, transparent 7%), linear-gradient(to bottom, #111 30%, transparent 30%), linear-gradient(to right, #222, #2e2e2e 5%, transparent 5%), linear-gradient(to right, transparent 6%, #222 6%, #2e2e2e 9%, transparent 9%), linear-gradient(to right, transparent 27%, #222 27%, #2e2e2e 34%, transparent 34%), linear-gradient(to right, transparent 51%, #222 51%, #2e2e2e 57%, transparent 57%), linear-gradient(to bottom, #111 35%, transparent 35%), linear-gradient(to right, transparent 42%, #222 42%, #2e2e2e 44%, transparent 44%), linear-gradient(to right, transparent 45%, #222 45%, #2e2e2e 47%, transparent 47%), linear-gradient(to right, transparent 48%, #222 48%, #2e2e2e 50%, transparent 50%), linear-gradient(to right, transparent 87%, #222 87%, #2e2e2e 91%, transparent 91%), linear-gradient(to bottom, #111 37.5%, transparent 37.5%), linear-gradient(to right, transparent 14%, #222 14%, #2e2e2e 20%, transparent 20%), linear-gradient(to bottom, #111 40%, transparent 40%), linear-gradient(to right, transparent 10%, #222 10%, #2e2e2e 13%, transparent 13%), linear-gradient(to right, transparent 21%, #222 21%, #1a1a1a 25%, transparent 25%), linear-gradient(to right, transparent 58%, #222 58%, #2e2e2e 64%, transparent 64%), linear-gradient(to right, transparent 92%, #222 92%, #2e2e2e 95%, transparent 95%), linear-gradient(to bottom, #111 48%, transparent 48%), linear-gradient(to right, transparent 96%, #222 96%, #1a1a1a 99%, transparent 99%), linear-gradient(to bottom, transparent 68.5%, transparent 76%, #111 76%, #111 77.5%, transparent 77.5%, transparent 86%, #111 86%, #111 87.5%, transparent 87.5%), linear-gradient(to right, transparent 35%, #222 35%, #2e2e2e 41%, transparent 41%), linear-gradient(to bottom, #111 68%, transparent 68%), linear-gradient(to right, transparent 78%, #333 78%, #333 80%, transparent 80%, transparent 82%, #333 82%, #333 83%, transparent 83%), linear-gradient(to right, transparent 66%, #222 66%, #2e2e2e 85%, transparent 85%);
  background-size: 300px 150px;
  background-position: center bottom;
}
.form-containers:before {
  content: '';
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  background-color: #111;
  background-image: linear-gradient(to top, #d2b48c 5%, #111 6%, #111 7%, transparent 7%), linear-gradient(to bottom, #111 30%, transparent 30%), linear-gradient(to right, #b22222, #871a1a 5%, transparent 5%), linear-gradient(to right, transparent 6%, #ff6347 6%, #ff3814 9%, transparent 9%), linear-gradient(to right, transparent 27%, #556b2f 27%, #39481f 34%, transparent 34%), linear-gradient(to right, transparent 51%, #fa8072 51%, #f85441 57%, transparent 57%), linear-gradient(to bottom, #111 35%, transparent 35%), linear-gradient(to right, transparent 42%, #008080 42%, #004d4d 44%, transparent 44%), linear-gradient(to right, transparent 45%, #008080 45%, #004d4d 47%, transparent 47%), linear-gradient(to right, transparent 48%, #008080 48%, #004d4d 50%, transparent 50%), linear-gradient(to right, transparent 87%, #789 87%, #4f5d6a 91%, transparent 91%), linear-gradient(to bottom, #111 37.5%, transparent 37.5%), linear-gradient(to right, transparent 14%, #bdb76b 14%, #989244 20%, transparent 20%), linear-gradient(to bottom, #111 40%, transparent 40%), linear-gradient(to right, transparent 10%, #808000 10%, #4d4d00 13%, transparent 13%), linear-gradient(to right, transparent 21%, #8b4513 21%, #5e2f0d 25%, transparent 25%), linear-gradient(to right, transparent 58%, #8b4513 58%, #5e2f0d 64%, transparent 64%), linear-gradient(to right, transparent 92%, #2f4f4f 92%, #1c2f2f 95%, transparent 95%), linear-gradient(to bottom, #111 48%, transparent 48%), linear-gradient(to right, transparent 96%, #2f4f4f 96%, #1c2f2f 99%, transparent 99%), linear-gradient(to bottom, transparent 68.5%, transparent 76%, #111 76%, #111 77.5%, transparent 77.5%, transparent 86%, #111 86%, #111 87.5%, transparent 87.5%), linear-gradient(to right, transparent 35%, #cd5c5c 35%, #bc3a3a 41%, transparent 41%), linear-gradient(to bottom, #111 68%, transparent 68%), linear-gradient(to right, transparent 78%, #bc8f8f 78%, #bc8f8f 80%, transparent 80%, transparent 82%, #bc8f8f 82%, #bc8f8f 83%, transparent 83%), linear-gradient(to right, transparent 66%, #a52a2a 66%, #7c2020 85%, transparent 85%);
  background-size: 300px 150px;
  background-position: center bottom;
  clip-path: circle(150px at center center);
  animation: flashlight 10s infinite alternate;
}
.form-containers:after {
  content: '';
  width: 25px;
  height: 10px;
  position: absolute;
  left: calc(50% + 59px);
  bottom: 100px;
  background-repeat: no-repeat;
  background-image: radial-gradient(circle, #fff 50%, transparent 50%), radial-gradient(circle, #fff 50%, transparent 50%);
  background-size: 10px 10px;
  background-position: left center, right center;
  animation: eyes 10s infinite alternate;
}
@-moz-keyframes flashlight {
  0%, 9% {
    opacity: 0;
    clip-path: circle(150px at 45% 10%);
  }
  10%, 15%, 85% {
    opacity: 1;
  }
  50% {
    clip-path: circle(150px at 60% 20%);
  }
  54%, 100% {
    clip-path: circle(150px at 55% 92%);
  }
  88%, 100% {
    opacity: 0;
  }
}
@-webkit-keyframes flashlight {
  0%, 9% {
    opacity: 0;
    clip-path: circle(150px at 45% 10%);
  }
  10%, 15%, 85% {
    opacity: 1;
  }
  50% {
    clip-path: circle(150px at 60% 20%);
  }
  54%, 100% {
    clip-path: circle(150px at 55% 92%);
  }
  88%, 100% {
    opacity: 0;
  }
}
@-o-keyframes flashlight {
  0%, 9% {
    opacity: 0;
    clip-path: circle(150px at 45% 10%);
  }
  10%, 15%, 85% {
    opacity: 1;
  }
  50% {
    clip-path: circle(150px at 60% 20%);
  }
  54%, 100% {
    clip-path: circle(150px at 55% 92%);
  }
  88%, 100% {
    opacity: 0;
  }
}
@keyframes flashlight {
  0%, 9% {
    opacity: 0;
    clip-path: circle(150px at 45% 10%);
  }
  10%, 15%, 85% {
    opacity: 1;
  }
  50% {
    clip-path: circle(150px at 60% 20%);
  }
  54%, 100% {
    clip-path: circle(150px at 55% 92%);
  }
  88%, 100% {
    opacity: 0;
  }
}
@-moz-keyframes eyes {
  0%, 52% {
    opacity: 0;
  }
  53%, 87% {
    opacity: 1;
  }
  64% {
    transform: scaleY(1);
  }
  67% {
    transform: scaleY(0);
  }
  70% {
    transform: scaleY(1);
  }
  88%, 100% {
    opacity: 0;
  }
}
@-webkit-keyframes eyes {
  0%, 52% {
    opacity: 0;
  }
  53%, 87% {
    opacity: 1;
  }
  64% {
    transform: scaleY(1);
  }
  67% {
    transform: scaleY(0);
  }
  70% {
    transform: scaleY(1);
  }
  88%, 100% {
    opacity: 0;
  }
}
@-o-keyframes eyes {
  0%, 52% {
    opacity: 0;
  }
  53%, 87% {
    opacity: 1;
  }
  64% {
    transform: scaleY(1);
  }
  67% {
    transform: scaleY(0);
  }
  70% {
    transform: scaleY(1);
  }
  88%, 100% {
    opacity: 0;
  }
}
@keyframes eyes {
  0%, 52% {
    opacity: 0;
  }
  53%, 87% {
    opacity: 1;
  }
  64% {
    transform: scaleY(1);
  }
  67% {
    transform: scaleY(0);
  }
  70% {
    transform: scaleY(1);
  }
  88%, 100% {
    opacity: 0;
  }
}


.message{
   background: #000;
   color: white;
}
.message span{

   color: white;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 450px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.8);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h1 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
  font-size: 40px;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:invalid ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box .user-box option,
.login-box .user-box select
{
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box form .o1 {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 10px;
  letter-spacing: 4px;
  background: black;
}

.login-box .o1:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box .o1 span {
  position: absolute;
  display: block;
}

.login-box .o1 span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box .o1 span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box .o1 span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box .o1 span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

.dont{
   font-size: 20px;
  margin-top: 40px;
  color: white;
  margin-bottom:14px;
}

.reg{
  font-size: 22px;
  font-family: myFirstFont;
  src: url(sansation_bold.woff);
  font-weight: bold;
  color: white;
  margin-left: 260px;
}

.reg:hover{
   
  color: #03e9f4;
  
}
</style>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-containers">

   <div class="login-box">
  <h1>Register Now</h1>
  <form action='' method='post'>
   
     <div class="user-box">
      <input type="text" name="name" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required="">
      <label>Name</label>
    </div>
     <div class="user-box">
      <input type="email" name="email" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required="">
      <label>Password</label>
    </div>
    <div class="user-box">
      <input type="password" name="cpassword" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required="">
      <label>Confirm your Password</label>
    </div>
    <div class="user-box">
      <select name="user_type" class="box">
         <option value="user" style="background-color: black;color: white;">user</option>
         <option value="admin" style="background-color: black;color: white;">admin</option>
      </select>
    </div>
    <div class="user-box">
      <input type="number" name="adminkey" >
      <label>Admin acccess key optional for user</label>
    </div>

    <button class='o1' name="submit" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
     Register Now
    </button>

    <p class='dont'> Already have an account? </p>  <a class='reg' href="login.php"> Login now
  </form>
</div>

</div>

</body>
</html>

