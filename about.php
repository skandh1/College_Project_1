<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>We are the modern day well established online book store designed to solve the problems of book readers. this website is created by four college students.</p>
         <p>This website is created as a college project not for commercial use <br>
         Shri vaishnav institute of management, indore (M.P.) <br>
            class: bca 6th sem <br>    
            Project members:-- <br>
               <div style='font-weight : 800; font-size: 20px'> Skandh jadon <br>
               Suraj patel <br>
               shivam setia <br>
               prateek khera <br> </div>
           
         </p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>I've read a lot of books on changing behavior and building habits and James Clear's Atomic Habits is my new favorite. This book is different from others in the way it covers an enormous amount of ground in the larger area of self-improvement while seamlessly tying all these ideas back into the central theme of habits.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Dale Carnegie's advice has remained constant and applicable across the years for a reason. It's simple and his techniques make perfect sense. If you're anything like me, you'll be kicking yourself when you see how you could have handled situations differently. I'm being transformed from a socially awkward, timid and defensive person, to someone that seems collected and confident.
</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Who's guilty of overthinking? I sure am. Read this book because it said it'd help people with reducing stress and focusing on what's important. Glad to say it truly did. I learned tactics on how to declutter my mind and be aware of when the overthinking patterns start - and how to stop them.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>What's that? A book changed my life? Nonsense!! Well, actually that's true, it DID change my life. Here's a very long review which I feel needs to be addressed, as many people don't know what the book is about, give it a 1-star rating and shrug it off as a money-grab scheme using foul language as a means to bait audiences. Which I honestly first thought it was.
</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>It's no exaggeration to say that this is the most anticipated book in finance in 2020. People who've read Morgan Housel's work through the years know that he is probably the most lucid and insightful writer in finance today. His writing has influenced anyone and everyone who's paying attention in the world of finance.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>I quite like Jordan Peterson. I think he has interesting things to say. I think he's unfairly criticised, often for things he hasn't said. I was curious what he had to say here so I went as far as paying money to find out, which was a mistake.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">greate authors</h1>

   <div class="box-container">

      <div class="box">
         <img src="https://static01.nyt.com/images/2012/10/14/nyregion/14FYI/14FYI-jumbo.jpg?quality=75&auto=webp&disable=upscale" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Dale Carnegie</h3>
      </div>

      <div class="box">
         <img src="https://cdn-bcmawriter.pressidium.com/wp-content/uploads/2018/12/James-Clear-768x960.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>James Clear</h3>
      </div>

      <div class="box">
         <img src="https://yt3.ggpht.com/ytc/AKedOLRRgwh0f3uM3kfJCBssPHwDRnmkt1AhclIcJB_6Ng=s900-c-k-c0x00ffffff-no-rj" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Mark Manson</h3>
      </div>

      <div class="box">
         <img src="https://upload.wikimedia.org/wikipedia/commons/c/c6/Web_Summit_2015_-_Dublin%2C_Ireland_%2822765900312%29.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Marie Kondo</h3>
      </div>

      <div class="box">
         <img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Elizabeth_Gilbert_at_TED.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Elizabeth Gilbert</h3>
      </div>

      <div class="box">
         <img src="https://static01.nyt.com/images/2017/07/08/obituaries/08johnson-web/08johnson-web-superJumbo.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Spencer Johnson</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>