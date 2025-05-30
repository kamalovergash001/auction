<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit;
}

$items = $conn->query("SELECT * FROM items ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Buyumlar ro‘yxati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🖼 Admin: Buyumlar</h2>
        <div>
            <a href="admin-panel.php" class="btn btn-secondary">⬅️ Orqaga</a>
            <a href="add-item.php" class="btn btn-primary">➕ Buyum qo‘shish</a>
        </div>
    </div>

    <div class="row">
        <?php while ($row = $items->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['title'] ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                        <a href="delete-item.php?id=<?= $row['id'] ?>" 
                           class="btn btn-danger mt-auto"
                           onclick="return confirm('O‘chirishga ishonchingiz komilmi?')">
                           ❌ Olib tashlash
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
