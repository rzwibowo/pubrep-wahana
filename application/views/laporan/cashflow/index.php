<!DOCTYPE html>
<html>
<?php include APPPATH . 'views/main-head.php'; ?>

<body class="fixed-header dashboard menu-pin menu-behind">
    <?php include APPPATH . 'views/main-sidebar.php'; ?>
    <div class="page-container ">
        <?php include APPPATH . 'views/main-header.php'; ?>
        <div class="page-content-wrapper ">
            <div class="content sm-gutter">
                <div class="container-fluid padding-25 sm-padding-10">
                    <div class="row">
                        <!-- mulai modul -->
                        <div class="card card-default">
                            <div class="card-header ">
                                <div class="card-title">Laporan Cashflow
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Pilih Rentang Tanggal</label>
                                            <input type="text" class="form-control" id="tanggal">
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-3 text-right">
                                        <label style="display: block;">&nbsp;</label>
                                        <a href="<?php echo base_url() ?>cashflow/cetak_lap" class="btn btn-primary btn-cons disabled" id="link-cetak" target="_blank">
                                            <i class="fa fa-print"></i> Cetak
                                        </a>
                                        <a href="<?php echo base_url() ?>cashflow/cetak_lap" class="btn btn-primary btn-cons disabled" id="link-unduh" target="_blank">
                                            <i class="fa fa-file-excel-o"></i> Unduh Excel
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="main-table">
                                        <thead>
                                            <tr>
                                                <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
											Comman Practice Followed
											-->
                                                <th>Transaksi</th>
                                                <th>Pemasukan</th>
                                                <th>Pengeluaran</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Parkir</td>
                                                <td class="text-right" id="parkir"></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tiket</td>
                                                <td class="text-right" id="tiket"></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="subtotal masuk">
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right" id="total_masuk"></td>
                                            </tr>
                                            <tr>
                                                <td>Biaya</td>
                                                <td></td>
                                                <td class="text-right" id="biaya"></td>
                                                <td></td>
                                            </tr>
                                            <tr class="subtotal keluar">
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right" id="total_keluar"></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right" id="grand_total"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- selesai modul -->
                </div>
            </div>

            <?php include APPPATH . 'views/main-footer.php'; ?>
        </div>

    </div>

    <?php include APPPATH . 'views/main-js.php'; ?>
    <script>
        const base_url = '<?php echo base_url() ?>';

        $('#tanggal').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            showDropdowns: true
        }, function(start, end, label) {
            setDataLap({})
            getData(start, end)
        })

        const hari_ini_slash = moment().format('DD/MM/YYYY')
        $('#tanggal').val(`${hari_ini_slash} - ${hari_ini_slash}`)
        getData(moment(), moment()) 

        function getData(start, end) {
            axios.get(`<?php echo base_url() ?>cashflow/dataLap/${moment(start).format('YYYY-MM-DD')}/${moment(end).format('YYYY-MM-DD')}`)
                .then(res => {
                    setDataLap(res.data)

                    $('#link-unduh').attr('href', `${base_url}cashflow/cetak_lap/excel/${start.format('YYYY-MM-DD')}/${end.format('YYYY-MM-DD')}`)
                    $('#link-unduh').removeClass('disabled')

                    $('#link-cetak').attr('href', `${base_url}cashflow/cetak_lap/laporan/${start.format('YYYY-MM-DD')}/${end.format('YYYY-MM-DD')}`)
                    $('#link-cetak').removeClass('disabled')
                })
                .catch(err => alert('Terjadi kesalahan, ' + err))
        }

        function setDataLap(dataObj) {
            const parkir = dataObj.parkir ? formatRupiah(dataObj.parkir) : 0
            const tiket = dataObj.tiket ? formatRupiah(dataObj.tiket) : 0
            const total_masuk = dataObj.total_masuk ? formatRupiah(dataObj.total_masuk) : 0

            const biaya = dataObj.biaya ? formatRupiah(dataObj.biaya) : 0
            const total_keluar = dataObj.total_keluar ? formatRupiah(dataObj.total_keluar) : 0

            const grand_total = dataObj.grand_total ? formatRupiah(dataObj.grand_total) : 0

            $('#parkir').text(parkir)
            $('#tiket').text(tiket)
            $('#total_masuk').text(total_masuk)

            $('#biaya').text(biaya)
            $('#total_keluar').text(total_keluar)

            $('#grand_total').text(grand_total)
        }
    </script>
</body>

</html>