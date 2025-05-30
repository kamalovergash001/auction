<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit;
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $target_dir = "uploads/";
    $filename = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . time() . "_" . $filename;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO items (title, image, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $target_file, $desc);
        $stmt->execute();
        $stmt->close();
        $msg = "<div class='alert alert-success'>✅ Buyum qo‘shildi!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>❌ Rasm yuklashda xatolik!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Buyum qo‘shish</title>
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
                    <h4>➕ Yangi buyum qo‘shish</h4>
                </div>
                <div class="card-body">
                    <a href="admin-items.php" class="btn btn-secondary mb-3">⬅️ Orqaga</a>
                    <?php if ($msg) echo $msg; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nomi</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Tavsif</label>
                            <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Rasm</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Qo‘shish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
