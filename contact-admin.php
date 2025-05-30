<?php
session_start();
require_once 'db.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    $stmt->execute();
    $stmt->close();
    $msg = "<div class='alert alert-success'>✅ Xabaringiz adminga yuborildi!</div>";
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Admin bilan bog‘lanish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>📩 Admin bilan bog‘lanish</h4>
                </div>
                <div class="card-body">
                    <?php if ($msg) echo $msg; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Ismingiz</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Xabaringiz</label>
                            <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Yuborish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
