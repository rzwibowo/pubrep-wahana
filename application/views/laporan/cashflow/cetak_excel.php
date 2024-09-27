<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cashflow</title>

    <?php
    $isExcel = true;
    if ($this->uri->segment('3') == 'excel') {
        header("Content-type: application/vnd-ms-excel");
        header("Content-disposition: attachment; filename=Laporan Cashflow " . date('Y-m-d') . ".xls");
    } else {
        $isExcel = false;
    }
    ?>

    <style>
        h3 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 3px;
        }

        td:not(td:first-child) {
            text-align: right;
        }

        .subtotal>td,
        .total>td {
            font-size: 15px !important;
            font-weight: bold;
        }
    </style>
</head>

<body <?php if (!$isExcel) echo 'onload="window.print()"' ?>>
    <h3>Laporan Cashflow
        <?php echo date('d-m-Y', strtotime($this->uri->segment('4'))) ?> hingga
        <?php echo date('d-m-Y', strtotime($this->uri->segment('5'))) ?>
    </h3>

    <?php
    function formatAngka($nilai)
    {
        return number_format((string)$nilai, 0, "", ".");
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Transaksi</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Parkir</td>
                <td><?php echo formatAngka($parkir) ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tiket</td>
                <td><?php echo formatAngka($tiket) ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="subtotal masuk">
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td><?php echo formatAngka($total_masuk) ?></td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td></td>
                <td><?php echo formatAngka($biaya) ?></td>
                <td></td>
            </tr>
            <tr class="subtotal keluar">
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td><?php echo formatAngka($total_keluar) ?></td>
            </tr>
            <tr class="total">
                <td>Total</td>
                <td></td>
                <td></td>
                <td><?php echo formatAngka($grand_total) ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>