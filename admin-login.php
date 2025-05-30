<?php
session_start();
require_once 'db.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Faqat bitta admin bo‘ladi
    if ($email === 'admin@example.com' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: admin-panel.php");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>❌ Noto'g'ri email yoki parol!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-4">🔐 Admin Panelga Kirish</h4>
        <?php if ($msg) echo $msg; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Admin Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="admin@example.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parol</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Parol" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirish</button>
        </form>
    </div>
</div>

</body>
</html>
