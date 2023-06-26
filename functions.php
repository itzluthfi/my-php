<?php
// connect ke database
$conn = mysqli_connect("localhost", "root", "", "webquote");

function query($query) {
    global $conn;
$result = mysqli_query($conn, $query);
$rows = [];
while( $row = mysqli_fetch_assoc($result) ) {
$rows[] = $row;
} 
return $rows;
}


function tambah($data) {
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $kutipan = htmlspecialchars($data["kutipan"]);
  
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO quotes VALUES('', '$gambar', '$username', '$kutipan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function upload() {
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

// cek apakah ada gambar yang di upload
if( $error === 4 ) {
    echo "<script>alert('pilih gambar terlebih dahulu!');
       </script>";
       return false;
}


// cek apakah yg di upload gambar atau bukan
$ekstensiGambarvalid = ['jpeg', 'jpg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));

if( !in_array($ekstensiGambar, $ekstensiGambarvalid)) {
    echo "<script>alert('yang anda upload bukan gambar!');
       </script>";
       return false;
}

// 
if ( $ukuranFile > 15000000 ) {
    echo "<script>alert('ukuran gambar terlalu besar!');
       </script>";
       return false;
}

// jika lolos pengecekan upload gambar
// generate nama file baru untuk mencegah nama file sama
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;
move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
return $namaFileBaru;

}


function cari($keyword) {
    global $conn;
    $query = "SELECT * FROM quotes WHERE 
              username LIKE '$keyword%' OR
              kutipan LIKE '$keyword%' 
          
              ";
              return query($query);

}



?>