<?php
session_start();

$items = [
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Nodira Monroe',
        'phone' => '+998 90 111 11 11',
        'email' => 'nodira@monroe.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Bobur Einstein',
        'phone' => '+998 91 222 22 22',
        'email' => 'bobur@einstein.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Lola Lennon',
        'phone' => '+998 93 333 33 33',
        'email' => 'lola@lennon.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Islom Jackson',
        'phone' => '+998 95 444 44 44',
        'email' => 'islom@mj.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Dilshoda Diana',
        'phone' => '+998 97 555 55 55',
        'email' => 'dilshoda@diana.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Javlon Jobs',
        'phone' => '+998 90 666 66 66',
        'email' => 'javlon@apple.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Sherali Muhammad',
        'phone' => '+998 91 777 77 77',
        'email' => 'sherali@ali.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Kamola Beethoven',
        'phone' => '+998 93 888 88 88',
        'email' => 'kamola@piano.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Abbos Mandela',
        'phone' => '+998 94 999 99 99',
        'email' => 'abbos@mandela.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=8c58fbb8ab3f3a3c9159e412e7ebe722ca28e1d0-5579164-images-thumbs&n=13',
        'owner' => 'Sardor Bruce',
        'phone' => '+998 95 000 00 00',
        'email' => 'sardor@brucelee.uz'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mashhurlar buyumlari</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        h2 { text-align: center; }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .item {
            background: white;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .item button {
            margin-top: 10px;
            padding: 10px 15px;
            background: #ffc107;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .item button:hover {
            background: #e0a800;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            padding-top: 100px;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            text-align: center;
        }

        .close {
            color: red;
            font-weight: bold;
            float: right;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>🎤 Mashhurlar buyumlari</h2>
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>

<div class="grid">
    <?php foreach ($items as $item): ?>
        <div class="item">
            <img src="<?= $item['img'] ?>" alt="Mashhurlar rasm">
            <button onclick="showInfo('<?= $item['owner'] ?>', '<?= $item['phone'] ?>', '<?= $item['email'] ?>')">Sotib olish</button>
        </div>
    <?php endforeach; ?>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>📞 Sotib olish uchun aloqa</h3>
        <p><strong>Ism:</strong> <span id="m_owner"></span></p>
        <p><strong>Telefon:</strong> <span id="m_phone"></span></p>
        <p><strong>Email:</strong> <span id="m_email"></span></p>
    </div>
</div>

<script>
    function showInfo(owner, phone, email) {
        document.getElementById("m_owner").innerText = owner;
        document.getElementById("m_phone").innerText = phone;
        document.getElementById("m_email").innerText = email;
        document.getElementById("modal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === document.getElementById("modal")) {
            closeModal();
        }
    };
</script>

</body>
</html>
