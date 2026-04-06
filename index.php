<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "service/database.php" ;

// Create
if(isset($_POST['ok'])) {
$hari = $_POST['hari'];
$akti = $_POST['akti'];

 $query = "INSERT INTO list (hari, akti) VALUES ('$hari', '$akti')";
    mysqli_query($conn, $query);

}

//Delete
if(isset($_POST['hapus'])) {
    $id = $_POST['id'] ;
    mysqli_query($conn, "DELETE FROM list WHERE id = $id");
}

//Update


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                    <a href='index.php?edit={$row['id']}'>Edit</a> |
                    <form action='index.php' method='post' style='display:inline'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button name='hapus' type='submit'>Hapus</button>
                    </form>
                </td>
        </tr>";
        $no++;
    }
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
