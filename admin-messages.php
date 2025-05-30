<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit;
}

$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Xabarlar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>💬 Kelgan xabarlar</h2>
        <a href="admin-panel.php" class="btn btn-secondary">⬅️ Orqaga</a>
    </div>

    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <?php if (!empty($row['image'])): ?>
                        <img src="<?= $row['image'] ?>" class="card-img-top" alt="Xabar rasmi" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                        <p class="card-text mb-1">📧 <strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
                        <p class="card-text mb-1">📱 <strong>Telefon:</strong> <?= htmlspecialchars($row['phone']) ?></p>
                        <p class="card-text">📝 <strong>Xabar:</strong><br><?= nl2br(htmlspecialchars($row['message'])) ?></p>
                    </div>
                    <div class="card-footer text-muted text-end">
                        ⏱ <?= date('Y-m-d H:i', strtotime($row['created_at'])) ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
