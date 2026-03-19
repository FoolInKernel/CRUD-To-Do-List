<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "service/database.php" ;

if(isset($_POST['ok'])) {
$hari = $_POST['hari'];
$akti = $_POST['akti'];

 $query = "INSERT INTO list (hari, akti) VALUES ('$hari', '$akti')";
    mysqli_query($conn, $query);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>To Do List</h1>


    <form action="index.php" method="post">
        <h3>Hari</h3>
         <select name="hari">
            <option value="senin">Senin</option>
            <option value="selasa">Selasa</option>
            <option value="rabu">Rabu</option>
            <option value="kamis">Kamis</option>
            <option value="jumat">Jum'at</option>
            <option value="sabtu">Sabtu</option>
            <option value="minggu">minggu</option>
        </select>
        <p>
        <input type="text" placeholder="Aktivitas" name="akti">
        <p>
        <button name="ok" type="submit" >oke</button>

    </form> 

    <h2>To Do List</h2>
<br><br>

<table>
    <tr>
        <th>No</th>
        <th>hari</th>
        <th>Aktivitas</th>
        <th>Dibuat</th>
    </tr>

     <?php
    $data = mysqli_query($conn, "SELECT * FROM list");
    $no = 1;

    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$row['hari']}</td>
            <td>{$row['akti']}</td>
            <td>{$row['created_at']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}'>Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>

</body>
</html>