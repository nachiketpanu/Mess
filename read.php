<?php

require_once 'conn.php';
// echo$_SESSION['firstname'];
//  echo $_SESSION['role']; 

if ($_SESSION['role'] == 'devloper') {
    $sql = "SELECT * FROM student";
    $query = $conn->prepare($sql);
}elseif ($_SESSION['role'] == 'school') {
    $cschool = $_SESSION['firstname']; // Ensure you use the correct session variable for school
    $sql = "SELECT * FROM student WHERE cschool = :cschool";
    $query = $conn->prepare($sql);
    $query->bindParam(':cschool', $cschool, PDO::PARAM_STR);
}

if ($query && $query->execute()) {
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Query execution failed: " . implode(" ", $query->errorInfo());
}

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        .btn-hover-white:hover{
            background-color: white;
            color: blue;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php">
                <img src="logo.PNG" alt="Logo" width="50" height="50" class=" align-text-top">
            </a>
            <h3 class="text-light">MY EDUCATION & SECURITY SUPPORT</h3> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <?php //if (!empty($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] = 'devloper') {
                          if ($_SESSION['role'] == 'devloper') { ?>
                        <a href="Signup.php" class="btn ms-auto p-2 text-light bd-highlight">Admin Signup</a>
                        <a href="Admin_read.php" class="btn ms-auto p-2 text-light bd-highlight">Admin Details</a>
                    <?php } ?>
                    </li>
                    <li>
                        <a href="Index.php" class="btn ms-auto p-2 text-light bd-highlight">Home</a>
                        <a href="ApplicationForm.php" class="btn ms-auto p-2 text-light bd-highlight">Student Signup</a>
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
    <?php //echo $_SESSION['role'];?>
    <div class="table-responsive">
     <table class="table table-striped table-hover">
         <tr>
             <th>No</th>
             <th>Studentname</th>
             <th>Mobile Number</th>
             <th>Current School Name</th>
             <th>G.R. NO.</th>
             <th>Email</th>
             <th>User name</th>
             <th>Password</th>
             <th colspan="2">Details</th>
         </tr>
         <?php
         $index = 1;
         foreach ($row as $result) {
            $id = encode('e',$result['id']);
         ?>
         <tr>
             <td><?php echo $index;?></td>
             <td><?php echo htmlspecialchars($result['fname']); ?></td>
             <td><?php echo htmlspecialchars($result['mob']); ?></td>
             <td><?php echo htmlspecialchars($result['cschool']); ?></td>
             <td><?php echo htmlspecialchars($result['grno']); ?></td>
             <td><?php echo htmlspecialchars($result['email']); ?></td>
             <td><?php echo htmlspecialchars($result['uname']); ?></td>
             <td><?php echo str_repeat("*", strlen($result['pass'])); ?></td>
             <td><a class="btn btn-info" href="show.php?id=<?php echo $id; ?>">Show</a></td>
             <td><a class="btn btn-danger" href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
         </tr>
         <?php 
         $index++;
         }

         ?>
     </table>
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