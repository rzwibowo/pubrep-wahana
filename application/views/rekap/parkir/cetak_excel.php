<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Transaksi Parkir</title>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-disposition: attachment; filename=Rekap Parkir " . date('Y-m-d') . ".xls");
    ?>

    <style>
        h3 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 3px;
        }

        td:last-child {
            text-align: right;
        }
    </style>
</head>

<body>
    <h3>Rekap Transaksi Parkir
        <?php echo date('d-m-Y', strtotime($this->uri->segment('5'))) ?> hingga
        <?php echo date('d-m-Y', strtotime($this->uri->segment('6'))) ?>
    </h3>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No Kendaraan</th>
                <th>Jenis Kendaraan</th>
                <th>Tgl Masuk</th>
                <th>Tgl Keluar</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            $i = 1;
            foreach ($rekap as $r) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $r->no_kendaraan ?></td>
                    <td><?php echo $r->nama_kategori_kendaraan ?></td>
                    <td><?php echo $r->tgl_transaksi_parkir ?></td>
                    <td><?php echo $r->tgl_transaksi_parkir_keluar ?></td>
                    <td><?php echo number_format((string)$r->nilai_transaksi_parkir, 0, "", ".") ?></td>
                </tr>
            <?php $i++;
                $total += $r->nilai_transaksi_parkir;
            } ?>
            <tr>
                <td colspan="5">Total biaya:</td>
                <td><?php echo number_format((string)$total, 0, "", ".") ?></td>
            </tr>
            <tr>
                <td colspan="5">Total data:</td>
                <td><?php echo sizeof($rekap) ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>