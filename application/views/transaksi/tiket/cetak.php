<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Masuk</title>

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

        .gorup-content {
            display: block;
            width: 100%;
        }

        .content-container {
            display: inline-block;
            width: 45%;
            vertical-align: top;
        }

        p.title {
            font-weight: bold;
            font-size: 10px;
            margin-bottom: .5em;
        }

        p.content {
            font-size: 14px;
            margin-top: .5em;
            margin-bottom: 1em;
        }
    </style>
</head>

<body onload="window.print()">
    <h3>Wahana</h3>
    <div class="group-content">
        <div class="content-container">
            <p class="title">Nomor Tiket: </p>
            <p class="content"><?php echo $header->no_transaksi_tiket ?></p>
        </div>
        <div class="content-container">
            <p class="title">Tanggal: </p>
            <p class="content"><?php echo $header->tanggal_transaksi_tiket ?></p>
        </div>
    </div>
    <p class="title">Nama Customer</p>
    <p class="content"><?php echo $header->nama_customer ?></p>
    <p class="title">Alamat Customer</p>
    <p class="content"><?php echo $header->alamat_customer . ', ' . $header->nama_kabupaten . ', ' . $header->nama_propinsi ?></p>
    <div class="group-content">
        <div class="content-container">
            <p class="title">Keterangan</p>
            <p class="content"><?php echo $header->keterangan_transaksi_tiket ?></p>
        </div>
        <div class="content-container">
            <p class="title">Total Biaya</p>
            <p class="content"><?php echo $header->grand_total_transaksi_tiket ?></p>
        </div>
    </div>

    <h4>Rombongan</h4>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Biaya Personel</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($rombongan as $r) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $r->nama_rombongan ?></td>
                    <td><?php echo $r->alamat_rombongan ?></td>
                    <td><?php echo $r->biaya_personel ?></td>
                </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</body>

</html>