<?php
// include "connect.php";

$message = "";
$error = "";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $university = mysqli_real_escape_string($conn, $_POST['university']);
    $project = mysqli_real_escape_string($conn, $_POST['project']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $research = mysqli_real_escape_string($conn, $_POST['research']);
    $how = mysqli_real_escape_string($conn, $_POST['how']);
    $reach = mysqli_real_escape_string($conn, $_POST['reach']); 
    $created_at = date('Y-m-d H:i:s');

    if (empty($fullName) || empty($email) || empty($number) || empty($university) || empty($project) || empty($level) || empty($research) || empty($how) || empty($reach)) {
        $error = "Please fill in all required fields.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } else {
            $sql = "INSERT INTO university (fullName, email, number, university, project, level, research,how, reach, created_at)
                    VALUES ('$fullName', '$email', '$number', '$university', '$project', '$level', '$research', '$how', '$reach', '$created_at')";

            if (mysqli_query($conn, $sql)) {
                $message = "Great news! Your university request has been successfully submitted! \uD83C\uDF89";
                $message .= "We'll be reaching out to you soon via WhatsApp to discuss your university and answer any questions you might have. We're excited to help you succeed!";

                $whatsappMessage = "University Details:\nName: $fullName\nUniversity: $university\nProject: $project\nLevel: $level\nInterest in research support: $research\nFuture research engagement: $reach\nEmail: $email";
                $whatsappLink = "https://wa.me/+2349023051314?text=" . urlencode($whatsappMessage);

                header("refresh:1;url=$whatsappLink");
            } else {
                $message = "Failed to add order: " . mysqli_error($conn);
            }
        }
        header("Location: $whatsappLink");
    }
}
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AladmoSolutionsHub</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="index.css">
    </head>
    <style>
        .low input,.low textarea,.das input,.low select{
            width: 100%;
            height: 50px;
            padding: 15px;
            border: none;
            outline: none;
            border-radius: 6px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        } 
        @media (max-width:764px) {
            .vid{
                margin-top: 10px;
            }
            .vide{
                margin-top: 20px;
            }
            .amm{
                position:fixed !important;
                right:5px;
                bottom: 0px;
            }
            .amm a svg{
                width:60px;
            }
            .navbar-brand h5{
                font-size:15px;
            }
            .navbar-brand {
                align-items:start !important;
            }
            .navbar-brand img{
                margin-left:40px;
                width:36px;
            }
            .navbar{
                padding:0px 0px 0px 0px !important;
            }
        }
    </style>
    <body>
        <div class="overflow-x-hidden">
            <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
                <div class="container">
                    <a class="navbar-brand d-flex flex-column align-items-center justify-content-center" >
                        <img src="./images/Aladmo_logo-removebg-preview.png" width="100%" alt="">
                        <h5 style="color:#14A8E7;font-size:15px">Aladmo Solutions Hub</h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto gap-4 d-flex align-items-center">
                            <li class="nav-item"><a class="nav-link" href="index.php" id="home-link">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html" id="about-link">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?id=services#services" id="services-link">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?id=review#review" id="contact-link">Review</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?id=faq#faq" id="faq-link">FAQS</a></li>
                            <li class="nav-item"><a class="bat " href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container section yoo mt-5">
                <div class="row mt-5">
                    <div class="col col-12 col-md-6 col-lg-6">
                        <div class="d-flex flex-column mum">
                        <h5>Webinar Registration Form</h5>
                        <p class="pt-2" style="text-align: left;">Aladmo Solutions Hub Presents: Mastering Access to Quality Journals: Essential Strategies for Effective Research Writing</p>
                    </div>
                    </div>
                    <div class="col col-12 col-md-6 col-lg-6">
                        <div>
                            <form action="" method="post" class="low">
                                <div class="row">
                                    <div class="col col-12 col-md-6 col-lg-6 vide">
                                        <div>
                                            <input type="text" name="fullName" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6">
                                        <div>
                                            <input type="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 mt-4">
                                        <div>
                                            <input type="tel" name="number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 mt-4">
                                        <div>
                                            <input type="text" name="university" placeholder="Institution/University Name" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 mt-4">
                                        <div>
                                            <input type="text" name="project" placeholder="Your Project Thesis Topics (Research Focus)" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 mt-4">
                                        <div>
                                            <input type="text" name="level" placeholder="Current Academic Level" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 mt-4">
                                        <div>
                                            <select name="research" id="" class="w-100">
                                                <option value="">Are you interested in learning more about how we can support your research needs?</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 mt-4">
                                        <div>
                                            <select name="how" id="" class="w-100">
                                                <option value="">How did you hear about the webinar?</option>
                                                <option value="Social Media(Facebook, LinkedIn, Twitter, etc.)">Social Media(Facebook, LinkedIn, Twitter, etc.)</option>
                                                <option value="University mail / Newsletter">University mail / Newsletter</option>
                                                <option value="Word of mouth">Word of mouth</option>
                                                <option value="Flyer / Poster">Flyer / Poster</option>
                                                <option value="Whatsapp Group">Whatsapp Group</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 vide mt-4">
                                        <div>
                                            <input type="text" name="reach" placeholder="Can you be contacted for potential  future research engagement?" required>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6 col-lg-6 vide mt-4 d-flex align-items-center justify-content-center">
                                        <button class="bat" name="submit">Get in touch</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="footer">
                <div class="container section">
                    <div class="row">
                        <div class="col col-12 col-md-4 col-lg-4">
                            <div>
                                <div class="con">
                                    <img src="./images/Aladmo_logo-removebg-preview.png" width="100%" alt=""> 
                                </div>
                                <div class="das pt-4">
                                    <h5>About Us</h5>
                                    <p>We help advance your research and innovations, providing the support needed to turn groundbreaking ideas into impactful solutions for the future</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 kel">
                            <div class="das pt-5">
                                <h5>Contact Us</h5>
                                <div class="d-flex gap-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <p>+234 90230 51314</p>
                                </div>
                                <div class="d-flex gap-2">
                                    <i class="bi bi-envelope-arrow-up-fill"></i>
                                    <p>Aladmosolutionshub@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 col-md-4 col-lg-4 kel">
                            <div class="das pt-5">
                                <h5>Subscribe to our Newsletter</h5>
                                <div class="pt-3">
                                    <form action="">
                                        <input type="email" placeholder="Enter your email">
                                        <button class="bat mt-4">Subscribe Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="text-align: center; padding-top: 50px;">&copy; 2025 Alumni Network | All rights reserved</p>
                </div>
            </div> 
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        navLinks.forEach(link => link.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const questions = document.querySelectorAll(".question");

                questions.forEach((question) => {
                    question.addEventListener("click", function() {
                        const currentlyOpen = document.querySelector(".answer.show");
                        
                        if (currentlyOpen && currentlyOpen !== this.nextElementSibling) {
                            currentlyOpen.classList.remove("show");
                        }

                        const answer = this.nextElementSibling;
                        answer.classList.toggle("show");
                    });
                });
            });
        </script>
    </body>
    </html>
