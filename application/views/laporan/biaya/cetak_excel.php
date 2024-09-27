<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Biaya</title>

    <?php
    $isExcel = true;
    if ($this->uri->segment('4') == 'excel') {
        header("Content-type: application/vnd-ms-excel");
        header("Content-disposition: attachment; filename=Laporan Biaya " . date('Y-m-d') . ".xls");
    } else {
        $isExcel = false;
    }
    ?>
    <?php
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

<body <?php if (!$isExcel) echo 'onload="window.print()"' ?>>
    <h3>Laporan Transaksi Biaya
        <?php echo date('d-m-Y', strtotime($this->uri->segment('5'))) ?> hingga
        <?php echo date('d-m-Y', strtotime($this->uri->segment('6'))) ?>
    </h3>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No Faktur</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Biaya</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            $i = 1;
            foreach ($rekap as $r) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $r->no_faktur ?></td>
                    <td><?php echo $r->tanggal_transaksi_biaya ?></td>
                    <td><?php echo $r->nama_kategori_biaya ?></td>
                    <td><?php echo number_format((string)$r->nilai_transaksi_biaya, 0, "", ".") ?></td>
                    <td><?php echo $r->jenis_transaksi_biaya ?></td>
                </tr>
            <?php $i++;
                $total += $r->nilai_transaksi_biaya;
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