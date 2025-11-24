<?php
require_once 'conn.php';

if (empty($_SESSION)) {
    header("location:login.php");
}

$uname = $_SESSION['username'];

$sql = "SELECT * FROM student WHERE uname = :uname";
$query = $conn->prepare($sql);
$query->bindParam(':uname', $uname);

if ($query->execute()) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiLocker Profile</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .verified-badge {
            color: white;
            background: #28a745;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        .passport-size {
            width: 100px;
            height: 120px;
            object-fit: cover;
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
<body>

<div class="container mt-5">
    <h2 class="text-primary">DigiLocker Profile</h2>
    <p>Here you can find or change profile information and also add or delete the nominee to your DigiLocker Account.</p>

    <div class="card p-4">
        <h5 class="text-primary">User Details</h5>
        <div class="d-flex align-items-center">
            <img src="Upload/<?php echo $result['pname']; ?>" class="profile-img me-3" alt="Profile Image">
            <span class="verified-badge">✔ Verified</span>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $result['fname'] . " " . $result['mname'] . " " . $result['lname']; ?></td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td><?php echo $result['dob']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $result['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Standard</th>
                        <td><?php echo $result['standard']; ?></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td><?php echo $result['mob']; ?></td>
                    </tr>
                    <tr>
                        <th>Current School</th>
                        <td><?php echo $result['cschool']; ?></td>
                    </tr>
                    <tr>
                        <th>Gr. Number</th>
                        <td><?php echo $result['grno']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $result['email']; ?> <i class="fas fa-edit edit-icon"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Marksheet -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="text-primary">Marksheet</h5>
                <img src="Upload/<?php echo $result['marksheetname']; ?>" class="img-fluid rounded" alt="Marksheet">
                <a href="Upload/<?php echo $result['marksheetname']; ?>" class="btn btn-link">View Document</a>
            </div>
        </div>

        <!-- Passport-size Photo -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="text-primary">Passport-size Photo</h5>
                <img src="Upload/<?php echo $result['pname']; ?>" class="passport-size rounded" alt="Passport Photo">
                <a href="Upload/<?php echo $result['pname']; ?>" class="btn btn-link">Download Photo</a>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
