<?php
session_start();

// Har bir rasm uchun ma’lumotlar
$items = [
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Ali Qilichboz',
        'phone' => '+998 90 123 45 67',
        'email' => 'aliqilichboz@gmail.com'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Aziza Tangachi',
        'phone' => '+998 91 765 43 21',
        'email' => 'aziza_tanga@mail.com'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Bek Temur',
        'phone' => '+998 93 333 33 33',
        'email' => 'bektemur@helmet.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Dilnoza Qadriya',
        'phone' => '+998 95 888 88 88',
        'email' => 'dilnoza@scrolls.uz'
    ],
    [
        'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Rustam Bronya',
        'phone' => '+998 97 123 00 11',
        'email' => 'rustam.armor@tarih.uz'
    ],
    [
  'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Zafar Vikingchi',
        'phone' => '+998 90 876 54 32',
        'email' => 'zafar@viking.uz'
    ],
    [
         'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Laylo Qogozchi',
        'phone' => '+998 93 456 78 90',
        'email' => 'laylo@tarixmail.com'
    ],
    [
  'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Sardor Kulolchilik',
        'phone' => '+998 94 001 22 33',
        'email' => 'sardor@pottery.uz'
    ],
    [
  'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Mansur Tangador',
        'phone' => '+998 95 334 55 66',
        'email' => 'mansur@coin.uz'
    ],
    [
          'img' => 'https://avatars.mds.yandex.net/i?id=dd4369fec48031281cf0787260515ac5_l-5130535-images-thumbs&n=13',
        'owner' => 'Nodira Qilichchi',
        'phone' => '+998 99 777 88 99',
        'email' => 'nodira@samurai.uz'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tarixiy buyumlar</title>
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
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .item button:hover {
            background: #0056b3;
        }

        /* Modal oynasi */
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

<h2>🛒 Tarixiy buyumlar – Sotib olish</h2>
<div style="text-align:right; padding: 20px;">
    <a href="logout.php" style="background: #dc3545; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">Chiqish</a>
</div>

<div class="grid">
    <?php foreach ($items as $index => $item): ?>
        <div class="item">
            <img src="<?= $item['img'] ?>" alt="Tarixiy rasm">
            <button onclick="showInfo('<?= $item['owner'] ?>', '<?= $item['phone'] ?>', '<?= $item['email'] ?>')">Sotib olish</button>
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal -->
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

    // Modalni tashqarisiga bosilsa yopish
    window.onclick = function(event) {
        const modal = document.getElementById("modal");
        if (event.target === modal) {
            closeModal();
        }
    };
</script>

</body>
</html>
