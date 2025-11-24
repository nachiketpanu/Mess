<?php

require_once 'conn.php';



$sql  = "SELECT * From student";

$query = $conn -> prepare($sql);

$query -> execute();

$row = $query -> fetchAll(PDO::FETCH_ASSOC);

// foreach ($row as $result){
    $_SESSION['userid'] = $row['userid'];
// }

unset($_SESSION['userid']);

if(session_destroy()){
    echo "<script>alert('Logout is Successful .');
          window.location.href='index.php';
          </script>";
}else{
    echo "<script>alert('Logout is not success !')</script>";
}
?>