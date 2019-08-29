<?php

include_once("koneksi.php");

$hasil = mysqli_query($mysqli, "SELECT * FROM tabel_user ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <style>
    th, td {
  border-bottom: 1px solid #ddd;
    }
    th {
  background-color: #000000;
  color: white;
    }
    table {
  border-collapse: collapse;
  width: 100%;
}
tr:nth-child(even) {background-color: #7FFFD4;}
    </style>

<a href="tambah.php"> Tambah User Baru</a><br/><br/>
    <table width='80%' border=1>
    <tr>
    <th>Foto</th><th>Nama</th> <th>Mobile</th> <th>Email</th> <th>Alamat</th>
    <th>Pilih aja</th>
    </tr>
    <?php
    while($user_data = mysqli_fetch_array($hasil)) {
        echo "<tr>";
        echo "<td align='center'><img src='gambar/semangka.jpg".$user_data['foto']."'width='80' height='80'></td>";
        echo "<td>".$user_data['nama']. "</td>";
        echo "<td>".$user_data['mobile']. "</td>";
        echo "<td>".$user_data['email']. "</td>";
        echo "<td>".$user_data['alamat']. "</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>