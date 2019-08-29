<?php
include_once("koneksi.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($mysqli, "UPDATE tabel_user SET 
    nama='$nama',mobile='$mobile',email='$email',alamat='$alamat' WHERE id=$id");
    
    header("Location:index.php");
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM tabel_user WHERE id = $id");

while($user_data = mysqli_fetch_array($result)){
    $nama = $user_data['nama'];
    $email = $user_data['email'];
    $mobile = $user_data['mobile'];
    $alamat = $user_data['alamat'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User Data</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method = "post" action="edit.php">
    <table border="0">
    <tr>
    <td>Nama</td>
    <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="text" name="email" value=<?php echo $email;?>></td>
    </tr>
    <tr>
    <td>Mobile</td>
    <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
    </tr>
    <tr>
    <td>Alamat</td>
    <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
    </tr>
    <tr>
    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
    <td><input type="submit" name="update" value="Update"></td>
    </tr>
    </table>
    </form>
</body>
</html>