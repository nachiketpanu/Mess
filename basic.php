<?php
require_once 'conn.php';

if(empty($_SESSION)){
    header("location:login.php");
}elseif($_SESSION['role'] == 'school'){
    header("UserDetails.php");
}elseif($_SESSION['role'] == 'devloper'){
    if (isset($_POST['submit'])){
        $uname = $_SESSION['username'];
    
        $sql = "SELECT * FROM developer WHERE uname = :uname";
    
        $query = $conn->prepare($sql);
    
        $query->bindParam(':uname', $uname);
    
        $query->execute();
    
        $userid = $_POST['userid'];
        $pass = $_POST['pass'];
                
        $sql = "insert into (fname,uname,pass) values (:fname, :userid, :pass)";
                
        $query = $conn -> prepare(sql);
                
        $query -> bindParam(':fname', $fname, PDO::PARAM_STR);
        $query -> bindParam(':userid', $userid, PDO::PARAM_STR);
        $query -> bindParam(':pass', $pass, PDO::PARAM_STR);
                
        if ($query -> execute()) {
            echo "<script>
            alert('Record Successfully Insert');
            Window.location.href='read.php';
            </script>";
        }else{
            echo"<script>alert('Record Insert Error !')";
        }
    }else{
        echo"<script>alert('Username problem !')</script>";
    }
}
exit;



// $row = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML Login Form -->
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
</head>
<body class="img"> 
    <nav class="navbar navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="Admin.php"><img src="bird2.png" alt="" width="50" height="50" class="d-inline-block align-text-top"></a>
        <a href="read.php" class="btn ms-auto p-2 bd-highlight">User Details</a>
    </div>
    </nav>
	<div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 ">
            <div class="card my-5">
                <form class="blure" method="post">
                    <h1 class="ms-5 text-primary">Admin Signup</h1><br><br>
                    <label class="ms-2">Name:-</label>
                    <input type="text" name="fname"><br><br>
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
</body>		
</html>