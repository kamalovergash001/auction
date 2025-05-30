<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">👨‍💼 Admin Panel</h2>
        <nav class="nav nav-pills flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link active" href="admin-panel.php">🏠 Bosh sahifa</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="admin-messages.php">💬 Xabarlar</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="admin-items.php">🖼 Buyumlar</a>
            <a class="flex-sm-fill text-sm-center nav-link text-danger" href="admin-logout.php">🚪 Chiqish</a>
        </nav>

        <div class="alert alert-info">
            <strong>Xush kelibsiz, Admin!</strong> Bu yerdan barcha tizimni boshqarishingiz mumkin.
        </div>
    </div>
</div>

</body>
</html>
