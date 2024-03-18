<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "lampiran/";
    $target_file = $target_dir . basename($_FILES["lampiran"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar valid atau bukan
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["lampiran"]["tmp_name"]);
        if ($check !== false) {
            echo "File adalah gambar - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Cek apakah file sudah ada di server
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Batasi ukuran file
    if ($_FILES["lampiran"]["size"] > 500000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Hanya izinkan beberapa tipe file
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Maaf, hanya izinkan file JPG, JPEG, PNG, dan GIF.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0 oleh error
    if ($uploadOk == 0) {
        echo "Maaf, file tidak terunggah.";
    } else { // Jika semuanya beres, uploud file
        if (move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["lampiran"]["name"])) . " telah berhasil diunggah.";
            // Lalu simpan nama file ke database, sesuaikan dengan kode Anda.
            // Misalnya, $nama_file = $_FILES["lampiran"]["name"];
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>
