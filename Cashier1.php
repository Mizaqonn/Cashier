<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier</title>
    <link rel="stylesheet" href="Cashier.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<button type="submit" name="kirim" value="kirim"><i class='bx bx-chevrons-left'></i><a href="Cashier.php">KEMBALI</a></button>
<?php
    session_start();
    if(isset($_GET['hapus'])) {
        $index = $_GET['hapus'];
        unset($_SESSION['toko'][$index]);
        header('Location: http://localhost/OOP/Cashier1.php');
        exit;
    }

    echo '<table border="1">';
    echo '<tr>';
    echo '<th>NAMA</th>';
    echo '<th>JUMLAH</th>';
    echo '<th>HARGA</th>';
    echo '<th>TOTAL</th>';
    echo '<th>AKSI</th>';
    echo '</tr>';

    $totalJumlah = 0;
    $totalHarga = 0;

    foreach($_SESSION['toko'] as $index => $value){
        $total = $value['JB']*$value['HB'];
        $totalJumlah += $value['JB'];
        $totalHarga += $total;


        echo '<tr>';
        echo '<td>' . $value['BR'] . '</td>';
        echo '<td>' . $value['JB'] . '</td>';
        echo '<td>' . $value['HB'] . '</td>';
        echo '<td>' . $total . '</td>';
        echo '<td> <a href="?hapus='.$index.'" class="btn btn-danger btn-sm">hapus</a></td>';
        echo '</tr>';
    }

    echo '<tr>';
    echo '<td colspan="3"><strong>Total</strong></td>';
    echo '<td>' . $totalHarga . '</td>';
    echo '<td></td>'; // Empty cell for consistency in column count
    echo '</tr>';

    echo "</table>";
    ?>
</body>
</html>