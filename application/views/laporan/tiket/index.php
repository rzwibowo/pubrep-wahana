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
                                <div class="card-title">Rekap Transaksi Tiket
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
                                        <a href="<?php echo base_url() ?>tiket/cetak_lap" class="btn btn-primary btn-cons disabled" id="link-cetak" target="_blank">
                                            <i class="fa fa-print"></i> Cetak
                                        </a>
                                        <a href="<?php echo base_url() ?>tiket/cetak_lap" class="btn btn-primary btn-cons disabled" id="link-unduh" target="_blank">
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
                                                <th style="width: 3%;"></th>
                                                <th style="width: 15%;">No Tiket</th>
                                                <th>Tanggal</th>
                                                <th>Nama Customer</th>
                                                <th>Alamat</th>
                                                <th style="width: 15%;">Total Biaya</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        Total data: <span class="summary" id="total-data">-</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        Total biaya: <span class="summary" id="total-biaya">-</span>
                                    </div>
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
        $(document).ready(function() {
            let notif = ''
            <?php if ($this->session->flashdata('notifikasi') != null) echo "notif='" . $this->session->flashdata('notifikasi') . "';" ?>

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })


            switch (notif) {
                case 'save-ok':
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil simpan data'
                    })
                    break
                case 'save-err':
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal simpan data'
                    })
                    break
                case 'delete-ok':
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil hapus data'
                    })
                    break
                case 'delete-err':
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal hapus data'
                    })
                    break

                default:
                    break
            }
        })

        const base_url = '<?php echo base_url() ?>';

        const col_def = [{
            searchable: false,
            targets: [0]
        }]
        let tabel_utama = $('#main-table').DataTable({
            columnDefs: col_def
        })

        $('#tanggal').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            showDropdowns: true
        }, function(start, end, label) {
            getData(start, end)
        })

        const hari_ini_slash = moment().format('DD/MM/YYYY')
        $('#tanggal').val(`${hari_ini_slash} - ${hari_ini_slash}`)
        getData(moment(), moment())

        function getData(start, end) {
            axios.get(`<?php echo base_url() ?>tiket/dataRekap/${moment(start).format('YYYY-MM-DD')}/${moment(end).format('YYYY-MM-DD')}`)
                .then(res => {
                    tabel_utama.destroy()

                    const rows = res.data.map((item, index) => {
                        let data = `<tr>
                            <td>${index+1}</td>
                            <td>${item.no_transaksi_tiket}</td>
                            <td>${item.tanggal_transaksi_tiket}</td>
                            <td>${item.nama_customer}</td>
                            <td>${item.alamat_customer}, ${item.nama_kabupaten}, ${item.nama_propinsi}</td>
                            <td class="text-right">${formatAngka(item.grand_total_transaksi_tiket)}</td>
                        </tr>`
                        return data
                    })
                    $('#main-table tbody').html(rows.join(''))


                    tabel_utama = $('#main-table').DataTable({
                        columnDefs: col_def
                    })

                    let total_biaya = 0

                    if (res.data.length > 0) {
                        $('#link-unduh').attr('href', `${base_url}tiket/cetak_lap/laporan/excel/${start.format('YYYY-MM-DD')}/${end.format('YYYY-MM-DD')}`)
                        $('#link-unduh').removeClass('disabled')

                        $('#link-cetak').attr('href', `${base_url}tiket/cetak_lap/laporan/dokumen/${start.format('YYYY-MM-DD')}/${end.format('YYYY-MM-DD')}`)
                        $('#link-cetak').removeClass('disabled')

                        total_biaya = res.data.reduce((total, item) => {
                            return total + parseInt(item.grand_total_transaksi_tiket)
                        }, 0)
                    } else {
                        $('#link-unduh').addClass('disabled')
                    }

                    $('#total-data').text(res.data.length)
                    $('#total-biaya').text(formatRupiah(total_biaya))
                })
                .catch(err => alert('Terjadi kesalahan, ' + err))
        }
    </script>
</body>

</html>