<?php
require 'functions.php';

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webquote");



// cek apakah tombol submit sudah di tekan/belum
if( isset($_POST["submit"])) {
    
    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0 )  {
        echo "<script>alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';</script>";
       
    } else {
        echo "<script>alert('data gagal ditambahkan!')</script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data kutipan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }


    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 80px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 10px;
    }

    h1 {
        text-align: center;
        margin-top: 30px;
        font-size: 24px;
        color: #333;
    }


    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        height: 80px;
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>


    <form action="" method="post" enctype="multipart/form-data">
        <h1>Posting kutipan anda di sini</h1>
        <br>
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required autocomplete="off">
            </li>
            <li>
                <label for="kutipan">Kutipan :</label>
                <textarea name="kutipan" id="kutipan" required autocomplete="off"></textarea>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar" autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>

    </form>

</body>

</html>