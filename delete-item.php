<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM items WHERE id=$id");
header("Location: admin-items.php");
exit;
