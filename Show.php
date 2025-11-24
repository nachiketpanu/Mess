<?php
require_once 'conn.php';

if(empty($_SESSION)){
    header("location:login.php");
}

if (isset($_GET['id'])){
    $id = encode('d', $_GET['id']);
    $sql = "SELECT * FROM student where id = :id";

    $query= $conn -> prepare($sql);

    $query -> bindParam(':id', $id);

    if($query -> execute()){
        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $result){
            $fname = $result['fname'];
            $mname = $result['mname'];
            $lname = $result['lname'];
            $standard = $result['standard'];
            $mob = $result['mob'];
            $cschool = $result['cschool'];
            $grno =$result['grno'];
            $email = $result['email'];
            $pname = $result['pname'];
            $marksheetname1 = $result['marksheet1'];
            $marksheetname2 = $result['marksheet2'];
            $marksheetname3 = $result['marksheet3'];
            $marksheetname4 = $result['marksheet4'];
            $marksheetname5 = $result['marksheet5'];
            $marksheetname6 = $result['marksheet6'];
            $marksheetname7 = $result['marksheet7'];
            $marksheetname8 = $result['marksheet8'];
            $marksheetname9 = $result['marksheet9'];
        }
    }else{
        echo "Query execution failed: " . implode(" ", $query->errorInfo());
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
	<style>
		body {
            background-image: url("background.jfif");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .gradient-card {
            background: linear-gradient(to right, #e42431, #9b6363);
            color: white;
            border:none;
        }

        .gradient-card h4,
        .gradient-card p {
            color: white;
        }

        .card {
            margin: 20px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 5%;
            object-fit: cover;
        }

        .passport-photo {
            width: 3.5cm; /* Passport photo width */
            height: 4.5cm; /* Passport photo height */
            object-fit: cover; /* Ensures the image fits well within the dimensions */
            border: none; /* Optional: Add a black border to mimic a passport photo */
            /*border-radius: 5px;  Slightly rounded corners for aesthetics */
            display: block;
        }

        .abc-card {
            background: #ff6b6b;
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: left;
        }

        .credit-points {
            font-size: 2.5rem;
            font-weight: bold;
        }
        
        .edit-icon {
            color: #007bff;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .profile-img {
                width: 80px;
                height: 80px;
            }
        }

	</style>
	</head>
<body background="background.jfif">
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
                        <a class="btn btn-danger text-light ms-2" href="read.php">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger text-light ms-2" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<div class="imaged">
    <!-- Details -->
    <div class="card p-4">
        <div class="d-flex align-items-center">
            <img src="Upload/<?php echo $pname; ?>" class="profile-img me-3" alt="Profile Image">
            <div>
                <h4>Hello, <strong><?php echo $fname . " " . $lname; ?></strong></h4>
                <p class="credit-points text-primary"><?php echo $grno;?></p>
            </div>
        </div>

        <!-- ABC ID Card -->
        <div class="abc-card mt-3">
             <h4>Name: <?php echo $fname, " ", $mname, " ", $lname, " ";?><br><br>
                        Standard : <?php echo $standard;?>
                        Mobile Number : <?php echo $mob;?><br><br>
                        Current School Name: <?php echo $cschool;?><br><br>
                        Gr. Number : <?php echo $grno;?><br><br>
                        Email Id: <?php echo $email;?></h4><br><br>
        </div>
    </div>
    

    <!-- Image Cards in a Row -->
    <div class="row">
        <!-- Marksheet Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet1/<?php echo $marksheetname1; ?>" class="card-img-top img-fluid" alt="Marksheet">
                <div class="card-body text-center">
                    <a href="marksheet1/<?php echo $marksheetname1; ?>" class="btn btn-primary">View Marksheet</a>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet2/<?php echo $marksheetname2; ?>" class="card-img-top img-fluid" alt="Profile Picture">
                <div class="card-body text-center">
                    <a href="marksheet2/<?php echo $marksheetname2; ?>" class="btn btn-primary">View Profile Picture</a>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet3/<?php echo $marksheetname3; ?>" class="card-img-top img-fluid" alt="Profile Picture">
                <div class="card-body text-center">
                    <a href="marksheet3/<?php echo $marksheetname3; ?>" class="btn btn-primary">View Profile Picture</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Cards in a Row -->
    <div class="row">
        <!-- Marksheet Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet4/<?php echo $marksheetname4; ?>" class="card-img-top img-fluid" alt="Marksheet">
                <div class="card-body text-center">
                    <a href="marksheet4/<?php echo $marksheetname4; ?>" class="btn btn-primary">View Marksheet</a>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet5/<?php echo $marksheetname5; ?>" class="card-img-top img-fluid" alt="Profile Picture">
                <div class="card-body text-center">
                    <a href="marksheet5/<?php echo $marksheetname5; ?>" class="btn btn-primary">View Profile Picture</a>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet6/<?php echo $marksheetname6; ?>" class="card-img-top img-fluid" alt="Profile Picture">
                <div class="card-body text-center">
                    <a href="marksheet6/<?php echo $marksheetname6; ?>" class="btn btn-primary">View Profile Picture</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Cards in a Row -->
    <div class="row">
        <!-- Marksheet Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet7/<?php echo $marksheetname7; ?>" class="card-img-top img-fluid" alt="Marksheet">
                <div class="card-body text-center">
                    <a href="marksheet7/<?php echo $marksheetname7; ?>" class="btn btn-primary">View Marksheet</a>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet8/<?php echo $marksheetname8; ?>" class="card-img-top img-fluid" alt="Profile Picture">
                <div class="card-body text-center">
                    <a href="marksheet8/<?php echo $marksheetname8; ?>" class="btn btn-primary">View Profile Picture</a>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg p-3 bg-body rounded">
                <img src="marksheet9/<?php echo $marksheetname9; ?>" class="card-img-top img-fluid" alt="Profile Picture">
                <div class="card-body text-center">
                    <a href="marksheet/<?php echo $marksheetname9; ?>" class="btn btn-primary">View Profile Picture</a>
                </div>
            </div>
        </div>
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
</div>
</body>
</html>