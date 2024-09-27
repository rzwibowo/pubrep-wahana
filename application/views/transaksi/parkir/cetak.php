<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Parkir</title>

    <style>
        body {
            width: 9.5cm;
            text-align: center;
            font-family: monospace;
            font-size: 12pt;
        }

        p {
            margin: .1cm auto;
        }

        p.no-kendaraan {
            font-size: 16pt;
            font-weight: bold;
            margin: 1cm auto;
        }
    </style>
</head>

<body onload="window.print()">
    <h3>Wahana</h3>
    <p>Nomor Parkir: <?php echo str_pad($parkir->id_transaksi_parkir, 5, '0', STR_PAD_LEFT) ?></p>
    <p><?php echo $parkir->tgl_transaksi_parkir ?></p>
    <p class="no-kendaraan"><?php echo $parkir->no_kendaraan ?></p>
    <p>Tarif: Rp <?php echo $parkir->nilai_transaksi_parkir ?></p>
</body>

</html>