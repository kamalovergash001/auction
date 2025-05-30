<?php
$conn = new mysqli("localhost", "root", "", "eauksion");
if ($conn->connect_error) {
    die("MySQL ulanishda xatolik: " . $conn->connect_error);
}
?>
