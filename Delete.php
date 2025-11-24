<?php
require_once 'conn.php';

if (isset($_GET['id'])) {
    $id = encode('d', $_GET['id']);

    $sql = "DELETE FROM student WHERE id = :id"; // or s_id if your column is s_id
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    if ($query->execute()) {
        if ($query->rowCount() > 0) {
            echo "<script>alert('Data Deleted Successfully.'); window.location.href='read.php';</script>";
        } else {
            echo "<script>alert('No record found to delete!');</script>";
        }
    } else {
        echo "<script>alert('Data Delete Error!');</script>";
    }
}
?>
