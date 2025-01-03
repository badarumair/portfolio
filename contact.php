<?php  include "nav.php"; 
include "includes/db.php";?>
<section class="header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1>Get In Touch</h1>
                    <p>I'd love to hear from you! Whether you have a project idea or just want to chat, feel free to reach out.</p>
                    <a href="#contact-form" class="btn btn-custom">Contact Form</a>
                </div>
                <div class="col-md-4">
                    <img src="img/contact-image.png" alt="Contact Image" class="img-fluid profile-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <div class="container" id="contact-form">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <h2 class="fw-bold text-success text-center mb-5">Contact Form</h2>
                <div class="contact-form">
                <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email and phone number
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address');</script>";
    } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        echo "<script>alert('Invalid phone number');</script>";
    } else {
        // Process the data (e.g., save to database or send email)
        
        // Database connection (Replace placeholders with actual values)
        
        $query= mysqli_query($db_connect, "INSERT into `user` 
        (user_name, user_email, user_phone,user_message)
       VALUES ('$name', '$email', '$phone', '$message')
        ");
         $success_msg = "<div class='alert alert-success'>Awesome! Thank  you  give me your feedback</div>";
   }
   }
   
   ?>
   <?php     
   if(isset($success_msg)){
       echo $success_msg;
   }
   
   ?>
   
                    <form action="" method="POST">
                        <div class="mb-4">
                            <label for="name">Enter Your Name:</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter your name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email">Enter Your Email:</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone">Enter Your Phone:</label>
                            <input type="number" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter your phone" required>
                        </div>

                        <div class="mb-4">
                            <label for="message">Send Me Some Message:</label>
                            <textarea name="message" id="message" rows="4" class="form-control" placeholder="Write your message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 My Portfolio. All rights reserved.</p>
    </footer>
