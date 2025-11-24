<?php
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role']; // 'user' or 'admin'

    // Validate input
    if (empty($uname) || empty($pass) || empty($role) || !in_array($role, ['school', 'devloper'])) {
        echo "Please fill in all fields.";
        exit;
    }
    
    $sql = "SELECT * FROM $role WHERE uname = :uname";
    $query = $conn->prepare($sql);
    $query->bindParam(':uname', $uname);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($row && $pass) {
        // Store user data in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['uname'];
        $_SESSION['firstname'] = $row['fname'];
        $_SESSION['role'] = $role;

        echo $_SESSION['user_id'];
        echo $_SESSION['username'];
        echo $_SESSION['role'];

        // Redirect based on role
        if ($role === 'school') {
            header("Location: read.php");
        } else if($role === 'devloper') {
            header("Location: signup.php");        
        }
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!-- HTML Login Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login page</title>
	<link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
</head>
<body>
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
                        <a href="Signin.php" class="btn ms-auto p-2 text-light bd-highlight">Signin</a>
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
                <h2  class="mx-5 text-primary">Sigin</h2><br>
                <form action="" method="POST">
                    <label for="uname" class="ms-2">Username:</label>
                    <input type="text" id="uname" name="uname" required><br><br>
                    
                    <label for="pass" class="ms-2">Password:</label>
                    <input type="password" id="pass" name="pass" required><br><br>

                    <label for="role" class="ms-2">Login As:</label>
                    <select id="role" name="role" required>
                        <option value="school">School</option>
                        <option value="devloper">counter</option>        
                    </select>

                    <input class="d-grid gap-2 col-6 mx-5 my-3 btn btn-primary" name="submit" type="submit" value="submit">
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
