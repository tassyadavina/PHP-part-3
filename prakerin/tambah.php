<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User</title>
</head>
<body>
    <a href="index.php">Go to Home</a>
    <br> <br>

    <form action="tambah.php" method="post" name="form1">
    <table width="25%" border="0">
    <tr>
    <td>Nama</td>
    <td><input type="text" name="nama"></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="text" name="email"></td>
    </tr>
    <tr>
    <td>Mobile</td>
    <td><input type="text" name="mobile"></td>
    </tr>
    <tr>
    <td>Alamat</td>
    <td><input type="text" name="alamat"></td>
    </tr>
    <tr>
    <td>Foto</td>
    <td><input type="file" name="foto"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="Kirim" value="Tambah"></td>
    </tr>
    </table>
    </form>

    <?php
    if(isset($_POST['Kirim'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $alamat = $_POST['alamat'];

        $foto = @$_FILES['foto']['name'];
        
        $folderFoto= "gambar";

        if(!is_dir($folderFoto));
        // mkdir($folderFoto);
        $fileTujuanFoto = $folderFoto."/".$foto;

        if(strlen($foto)>0){
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                move_uploaded_file($_FILES['foto']['tmp_name'],$fileTujuanFoto);
            }
        }

        include_once("koneksi.php");

        $result = mysqli_query($mysqli, "INSERT INTO tabel_user(nama,email,mobile,alamat,foto) 
        VALUES('$nama','$email','$mobile','$alamat','$foto')");

        echo "Biodata user telah ditambahkan, Terimakasih. 
        <a href='index.php'>Lihat Data User</a>";
    }
    ?>
</body>
</html>