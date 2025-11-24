<?php
require_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        .custom-carousel {
            margin-top: 10%;
        }
        .custom-carousel img {
            width: 100%;
            height: 100vh;
            min-height:200px;
            min-width:300px;
            object-fit: cover;
        }
        /* For WebKit browsers */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background:rgb(27, 83, 235);
            border-radius: 5px;
        }
        ::-webkit-scrollbar-track {
            background:rgba(39, 175, 243, 0.59);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php">
                <img src="logo.PNG" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <center><h3 class="text-light">MY EDUCATION & SECURITY SUPPORT</h3></center>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="Signin.php" class="btn ms-auto p-2 text-light bd-highlight">Signin</a>
                        <a href="ApplicationForm.php" class="btn ms-auto p-2 text-light bd-highlight">Signup</a>
                    </li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] !== 'student') { ?>
                        <li class="nav-item">
                            <a class="btn text-light ms-2 bd-highlight" href="read.php">Read</a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($_SESSION)) { ?>
                        <li class="nav-item">
                            <a class="btn btn-danger text-light ms-2" href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide custom-carousel mx-auto w-75" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Slides/1.png" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="Slides/2.png" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="Slides/1.png" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Services Section -->
    <div class="container my-5">
        <div class="row">
            <?php 
            $services = [
                ['title' => 'EASY ACCOUNTING SYSTEM FOR SCHOOL', 'img' => 'Include_services/1.jpg'],
                ['title' => 'EASY ATTENDANCE AND STUDENT RECORD SYSTEM', 'img' => 'Include_services/2.jpg'],
                ['title' => 'LIVE INFO OF STUDENT (IN & OUT TIME)', 'img' => 'Include_services/3.png'],
                ['title' => 'LIVE LOCATION FOR BUS STUDENTS', 'img' => 'Include_services/4.jpg'],
                ['title' => 'CREATING UNIVERSAL IDENTITY ONLINE', 'img' => 'Include_services/5.png'],
                ['title' => 'SCHOOL IDENTITY CARDS', 'img' => 'Include_services/6.jpg'],
                ['title' => 'MARKETING CAMPAIGN FOR SCHOOL', 'img' => 'Include_services/7.jpg'],
                ['title' => 'GUIDANCE IN ADMISSION PROCESS', 'img' => 'Include_services/8.jpg'],
                ['title' => '10 LECTURES/YEAR FROM HIGH TECH TUTORS', 'img' => 'Include_services/9.jpg'],
                ['title' => 'GUIDANCE FOR SPORTS TO HIGH LEVELS', 'img' => 'Include_services/10.jpg'],
                ['title' => 'SELF DEFENSE ACTIVITIES', 'img' => 'Include_services/11.jpg'],
                ['title' => 'PRODUCTIVE LEARNING TECHNIQUES', 'img' => 'Include_services/12.jpg'],
                ['title' => 'CAREER GUIDANCE', 'img' => 'Include_services/13.jpg'],
                ['title' => 'FOREIGN STUDIES GUIDANCE', 'img' => 'Include_services/14.jpg']
            ];
            foreach ($services as $service) { ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded h-100">
                        <img src="<?= $service['img'] ?>" class="card-img-top img-fluid" alt="<?= $service['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $service['title'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <footer class="bg-primary text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Logo and Contact -->
            <div class="col-md-3 text-center">
                <a class="navbar-brand" href="Admin.php">
                    <img src="logo.PNG" alt="Logo" width="100" height="100" class="d-block mx-auto">
                </a>
                <p class="mt-3">Contact Us</p>
                <p>Privacy Policy</p>
            </div>
            
            <!-- Site Map -->
            <div class="col-md-3">
                <h5 class="mb-3">Site Map</h5>
                <ul class="list-unstyled">
                    <li><a href="Index.php" class="text-white" style="text-decoration: none;">Home</a></li>
                    <li><a href="Signin.php" class="text-white" style="text-decoration: none;">Sign In</a></li>
                    <li><a href="Signup.php" class="text-white" style="text-decoration: none;">Sign Up</a></li>
                    <li><a href="Admin.php" class="text-white" style="text-decoration: none;">Admin</a></li>
                    <li><a href="UserDetails.php" class="text-white" style="text-decoration: none;">User Details</a></li>
                    <li><a href="Admin_Read.php" class="text-white" style="text-decoration: none;">Admin Details</a></li>
                </ul>
            </div>
            
            <!-- Social Media -->
            <div class="col-md-3">
                <h5 class="mb-3">Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white" style="text-decoration: none;">Instagram</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">WhatsApp</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">Facebook</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">Twitter</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">YouTube</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-md-3">
                <h5 class="mb-3">Contact</h5>
                <ul class="list-unstyled">
                    <li>Email: mess@gmail.com</li>
                    <li>Phone: 8542639854</li>
                </ul>
            </div>
        </div>
        
        <!-- Feedback Form -->
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <form method="post" class="d-flex">
                    <input type="text" name="feedback" id="feedback" placeholder="Your Feedback" class="form-control ms-2">
                    <button type="submit" class="btn btn-danger ms-2">Submit</button>
                </form>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="text-center mt-4">
            <p>&copy; 2025 Pranav Shinde. All rights reserved.</p>
        </div>
    </div>
</footer>

    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
