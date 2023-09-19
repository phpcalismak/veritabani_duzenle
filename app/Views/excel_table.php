<!-- app/Views/excel_table.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Excel Verileri</title>
</head>
<body>
    <h1>Excel Verileri</h1>
    <table border="1">
        <tr>
            <th>Blok Adı</th>
            <th>Daire No</th>
            <th>Daire Tipi</th>
            <th>Ev Sahibi ID</th>
            <th>Kiracı ID</th>
            <th>Kasa</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['blok_adi'] ?></td>
                <td><?= $row['daire_no'] ?></td>
                <td><?= $row['daire_tipi'] ?></td>
                <td><?= $row['ev_sahibi_id'] ?></td>
                <td><?= $row['kiraci_id'] ?></td>
                <td><?= $row['kasa'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
