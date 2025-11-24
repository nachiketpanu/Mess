<?php
require_once 'conn.php';

if (isset($_POST['submit'])) {

    $uname = $_POST['userid'];
    $pass = $_POST['pass'];

    if (!empty($uname) && !empty($pass)) {

        $sql = "SELECT * FROM student WHERE uname = :uname";
        $query = $conn->prepare($sql);
        $query->bindParam(':uname', $uname);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row && $pass) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['uname'];
            echo "<script>alert('Login Success! Welcome " . $_SESSION['username'] . "');
            window.location.href='UserDetails.php';</script>";

        } else {
            echo "<script>alert('Please enter both User ID and Password.');</script>";
        }
    }
    
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
    <style>
        .btn-hover-white:hover{
            background-color: white;
            color: blue;
        }
    </style>
</head>
<body class="img"> 
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php">
                <img src="logo.PNG" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <h3 class="text-light">MY EDUCATION & SECURITY SUPPORT</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="btn ms-auto p-2 text-light bd-highlight">Home</a>
                        <a href="Admin.php" class="btn ms-auto p-2 text-light bd-highlight">Admin</a>
                        <a href="ApplicationForm.php" class="btn ms-auto p-2 text-light bd-highlight">Signup</a>
                    </li>
                    <?php if (!empty($_SESSION)) { ?>
                        <li class="nav-item">
                            <a class="btn btn-danger text-light ms-2" href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

	<div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 ">
            <div class="card my-5">
                <form class="blure" method="post">
                    <h1 class="ms-5 text-primary">Signin</h1><br><br>
                    <label class="ms-2">User Name:-</label>
                    <input type="text" name="userid"><br><br>
                    <label class="ms-2"> Password :- </label>
                    <input type="password" name="pass"><br><br>
                    <input class="d-grid gap-2 col-6 mx-5 btn btn-primary" name="submit" type="submit" value="submit">
                </form>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <footer class="bg-primary text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Logo and Contact -->
            <div class="col-md-3 text-center">
                <a class="navbar-brand" href="Admin.php">
                    <img src="logo.PNG" alt="Logo" width="50" height="50" class="d-block mx-auto">
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
        <!-- <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <form method="post" class="d-flex">
                    <input type="text" name="feedback" id="feedback" placeholder="Your Feedback" class="form-control">
                    <button type="submit" class="btn btn-danger ms-2">Submit</button>
                </form>
            </div>
        </div> -->
        
        <!-- Copyright -->
        <div class="text-center mt-4">
            <p>&copy; 2025 Pranav Shinde. All rights reserved.</p>
        </div>
    </div>
</footer>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>		
</html>