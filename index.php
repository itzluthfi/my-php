<?php
require 'functions.php';

$webquotes = query("SELECT * FROM quotes");

// ketika tombol cari di tekan
if( isset($_POST["cari"])) {
    $webquotes = cari($_POST["keyword"]);
    if (!$webquotes) {
        echo "<script>alert('nama tidak terdaftar')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Daftar Kutipan</h1>

    <a class="tambah" href="tambah.php">Posting Kutipan Anda Di Sini</a>


    <form action="" method="post">
        <!-- Form Pencarian -->
        <input type="text" name="keyword" id="keyword" size="35" autofocus placeholder="masukkan keyword pencarian..."
            autocomplete="off" required>
        <button type="submit" name="cari" id="tombol-cari">cari</button>
    </form>
    <br>

    <div id="container">

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <!-- <th>Penulis</th> -->
                <th>Kutipan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($webquotes as $quote) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="img/<?= $quote['gambar']; ?>" alt=""></td>
                <td><?= $quote['username']; ?></td>
                <td class="kutipan">"<?= $quote['kutipan']; ?>"</td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>

    </div>


</body>

</html>