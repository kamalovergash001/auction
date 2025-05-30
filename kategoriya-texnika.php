<?php
session_start();

$items = [
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Murod Hisobchi',
        'phone' => '+998 90 555 55 01',
        'email' => 'murod@calculator.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Aziz Telefonchi',
        'phone' => '+998 91 666 66 02',
        'email' => 'aziz@phone.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Dilshod Mashinka',
        'phone' => '+998 93 777 77 03',
        'email' => 'dilshod@typewriter.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Sabrina Globuschi',
        'phone' => '+998 95 888 88 04',
        'email' => 'sabrina@mapmail.com'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Sherzod Fotograf',
        'phone' => '+998 97 999 99 05',
        'email' => 'sherzod@camera.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Zuxra Radioci',
        'phone' => '+998 90 111 11 06',
        'email' => 'zuxra@radio.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Mansur Televizionchi',
        'phone' => '+998 91 222 22 07',
        'email' => 'mansur@tvmail.com'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Kamola GPS',
        'phone' => '+998 93 333 33 08',
        'email' => 'kamola@gps.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Alisher Proektorchi',
        'phone' => '+998 94 444 44 09',
        'email' => 'alisher@projector.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=5e52d6d42c801d45105b9be544ec37b0efe0cb45-5213143-images-thumbs&n=13',
        'owner' => 'Nodir Kompyuterchi',
        'phone' => '+998 95 555 55 10',
        'email' => 'nodir@computer.uz'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Joy va texnika</title>
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
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .item button:hover {
            background: #218838;
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

<h2>📡 Joy va texnika buyumlari</h2>
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>

<div class="grid">
    <?php foreach ($items as $item): ?>
        <div class="item">
            <img src="<?= $item['img'] ?>" alt="Texnika rasm">
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
