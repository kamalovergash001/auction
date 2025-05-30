<?php
$target_dir = "uploads/";
$filename = time() . "_" . preg_replace('/\s+/', '_', basename($_FILES["image"]["name"]));
$target_file = $target_dir . $filename;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // muvaffaqiyatli yuklandi
} else {
    echo "❌ Rasm yuklanmadi!";
}
