<?php
session_start();
$loggedIn = isset($_SESSION['fullname']);
$fullname = $loggedIn ? $_SESSION['fullname'] : '';
$role = $loggedIn ? $_SESSION['role'] : '';
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>E-auksion - Bosh sahifa</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            padding: 15px 30px;
            color: white;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .menu a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .navbar .menu a:hover {
            text-decoration: underline;
        }

        .welcome {
            padding: 40px;
            text-align: center;
        }

        .profile-box {
            margin: 20px auto;
            background: white;
            padding: 25px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        .profile-box h3 {
            margin-top: 0;
            color: #333;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar .menu {
                margin-top: 10px;
            }

            .navbar .menu a {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">E-AUKSION</div>
    <div class="menu">
        <a href="index.php">Bosh sahifa</a>
        <a href="kategoriya-tarixiy.php">Tarixiy</a>
        <a href="kategoriya-texnika.php">Joy & Texnika</a>
        <a href="kategoriya-mashhurlar.php">Mashhurlar</a>
        <a href="contact-admin.php">Admin bilan bog‘lanish</a>
        <?php if ($loggedIn): ?>
            <a href="logout.php">Chiqish</a>
        <?php else: ?>
            <a href="auth.php">Kirish</a>
        <?php endif; ?>
    </div>
</div>

<div class="welcome">
    <h2>Xush kelibsiz E-auksion platformasiga!</h2>
    <p>Kategoriyalar orqali kerakli mahsulotni tanlang yoki admin bilan bog‘laning.</p>

    <?php if ($loggedIn): ?>
        <div class="profile-box">
            <h3>👤 Profil</h3>
            <p><strong>Foydalanuvchi:</strong> <?= htmlspecialchars($fullname) ?></p>
            <p><strong>Rol:</strong> <?= htmlspecialchars($role) ?></p>
            <?php if ($role === 'admin'): ?>
                <a class="btn" href="admin-panel.php">🔧 Admin Panelga O‘tish</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
