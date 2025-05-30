<?php
session_start();
require_once 'db.php';

$msg = "";

// Ro‘yxatdan o‘tish
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $password, $role);

    if ($stmt->execute()) {
        $msg = "✅ Muvaffaqiyatli ro'yxatdan o'tdingiz. Endi tizimga kiring.";
    } else {
        $msg = "❌ Email mavjud bo'lishi mumkin.";
    }
    $stmt->close();
}

// Kirish
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT fullname, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($fullname, $hashedPassword, $role);
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            header("Location: index.php");
            exit;
        } else {
            $msg = "❌ Noto'g'ri parol!";
        }
    } else {
        $msg = "❌ Email topilmadi!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kirish / Ro‘yxatdan o‘tish</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: none;
        }

        form.active {
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            margin-top: 10px;
        }

        .toggle {
            text-align: center;
            margin-top: 10px;
        }

        .msg {
            text-align: center;
            padding: 10px;
            background: #e9ecef;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if ($msg): ?>
        <div class="msg"><?= $msg ?></div>
    <?php endif; ?>

    <form id="loginForm" class="active" method="POST">
        <h2>Kirish</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Parol" required>
        <button type="submit" name="login">Kirish</button>
        <div class="toggle">
            Ro‘yxatdan o‘tmaganmisiz? <a href="#" onclick="toggleForm('register')">Ro‘yxatdan o‘tish</a>
        </div>
    </form>

    <form id="registerForm" method="POST">
        <h2>Ro‘yxatdan o‘tish</h2>
        <input type="text" name="fullname" placeholder="Ism" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Parol" required>
        <button type="submit" name="register">Ro‘yxatdan o‘tish</button>
        <div class="toggle">
            Allaqachon ro‘yxatdan o‘tganmisiz? <a href="#" onclick="toggleForm('login')">Kirish</a>
        </div>
    </form>
</div>

<script>
    function toggleForm(type) {
        document.getElementById("loginForm").classList.remove("active");
        document.getElementById("registerForm").classList.remove("active");

        if (type === 'login') {
            document.getElementById("loginForm").classList.add("active");
        } else {
            document.getElementById("registerForm").classList.add("active");
        }
    }
</script>

</body>
</html>
