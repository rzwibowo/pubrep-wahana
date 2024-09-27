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
                                <div class="card-title">Rekap Transaksi Parkir
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
                                    <div class="col-md-3 offset-md-6 text-right">
                                        <label style="display: block;">&nbsp;</label>
                                        <a href="<?php echo base_url() ?>parkir/cetak_lap" class="btn btn-primary btn-cons disabled" id="link-unduh" target="_blank">
                                            <i class="fa fa-file-excel-o"></i> Unduh Excel
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-condensed" id="main-table">
                                        <thead>
                                            <tr>
                                                <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
											Comman Practice Followed
											-->
                                                <th style="width: 3%;"></th>
                                                <th>No Kendaraan</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tgl Masuk</th>
                                                <th>Tgl Keluar</th>
                                                <th>Biaya</th>
                                                <th style="width: 5%;">Opsi</th>
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

                        <div class="modal fade stick-up" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header clearfix text-left">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                        </button>
                                        <h5>Data <span class="semi-bold">Transaksi Parkir</span></h5>
                                    </div>
                                    <form role="form" name="form-transaksi-parkir" method="POST" action="<?php echo base_url() ?>parkir/update">
                                        <input type="hidden" name="id_transaksi_parkir">
                                        <div class="modal-body">
                                            <div class="form-group-attached">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group pr-3">
                                                            <label>Tanggal</label>
                                                            <input name="tanggal" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jam</label>
                                                            <input name="jam" type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>No. Kendaraan</label>
                                                            <input name="no_kendaraan" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>Kategori Kendaraan</label>
                                                            <select name="id_kategori_kendaraan" class="form-control">
                                                                <?php foreach ($kategori_kendaraan as $kk) { ?>
                                                                    <option value="<?php echo $kk->id_kategori_kendaraan ?>" data-tarif="<?php echo $kk->tarif_kategori_kendaraan ?>">
                                                                        <?php echo $kk->kode_kategori_kendaraan . ' | ' . $kk->nama_kategori_kendaraan ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>Tarif</label>
                                                            <input name="nilai_transaksi_parkir" type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 m-t-10 sm-m-t-10 offset-md-8">
                                                    <button type="submit" class="btn btn-primary btn-block m-t-5">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
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
                targets: [0, -1]
            },
            {
                orderable: false,
                targets: [-1]
            }
        ]
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
            axios.get(`<?php echo base_url() ?>parkir/dataRekap/${moment(start).format('YYYY-MM-DD')}/${moment(end).format('YYYY-MM-DD')}`)
                .then(res => {
                    tabel_utama.destroy()

                    const rows = res.data.map((item, index) => {
                        let data = `<tr>
                            <td>${index+1}</td>
                            <td>${item.no_kendaraan}</td>
                            <td>${item.nama_kategori_kendaraan}</td>
                            <td>${item.tgl_transaksi_parkir}</td>
                            <td>${item.tgl_transaksi_parkir_keluar}</td>
                            <td class="text-right">${formatAngka(item.nilai_transaksi_parkir)}</td>
                            <td class="text-right">
                                <div class="btn-group btn-group-xs sm-m-t-10">`
                            if (parseInt(item.out_transaksi_parkir) !== 1) {
                                data += `<button type="button" class="btn btn-default" onclick="edit(${item.id_transaksi_parkir})"><i class="fa fa-pencil"></i>
                                        </button>`
                            }
                            data += `   <button type="button" class="btn btn-default" onclick="hapus(${item.id_transaksi_parkir})"><i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>`
                        return data
                    })
                    $('#main-table tbody').html(rows.join(''))


                    tabel_utama = $('#main-table').DataTable({
                        columnDefs: col_def
                    })

                    let total_biaya = 0

                    if (res.data.length > 0) {
                        $('#link-unduh').attr('href', `${base_url}parkir/cetak_lap/rekap/excel/${start.format('YYYY-MM-DD')}/${end.format('YYYY-MM-DD')}`)
                        $('#link-unduh').removeClass('disabled')

                        total_biaya = res.data.reduce((total, item) => {
                            return total + parseInt(item.nilai_transaksi_parkir)
                        }, 0)
                    } else {
                        $('#link-unduh').addClass('disabled')
                    }

                    $('#total-data').text(res.data.length)
                    $('#total-biaya').text(formatRupiah(total_biaya))
                })
                .catch(err => alert('Terjadi kesalahan, ' + err))
        }

        function edit(id) {
            axios.get('<?php echo base_url() ?>parkir/get/' + id)
                .then(res => {
                    const data = res.data[0]
                    $('input[name=id_transaksi_parkir]').val(data.id_transaksi_parkir)
                    $('input[name=no_kendaraan]').val(data.no_kendaraan)
                    $('select[name=id_kategori_kendaraan]').val(data.id_kategori_kendaraan)
                    $('input[name=nilai_transaksi_parkir]').val(formatAngka(data.nilai_transaksi_parkir))
                    $('input[name=tanggal]').val(moment(data.tgl_transaksi_parkir).format('DD-MM-YYYY'))
                    $('input[name=jam]').val(moment(data.tgl_transaksi_parkir).format('HH:mm:ss'))

                    $('#myModal').modal('show')
                })
                .catch(err => alert('Terjadi kesalahan, ' + err))
        }

        function hapus(id) {
            Swal.fire({
                title: 'Hapus Data?',
                text: 'Hapus Data Transaksi Parkir?',
                type: 'warning',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    location.assign('<?php echo base_url() ?>parkir/delete/' + id)
                }
            })
        }

        function setTarif() {
            const tarif = formatAngka($('select[name=id_kategori_kendaraan]').find(':selected').data('tarif'))
            $('input[name=nilai_transaksi_parkir]').val(tarif)
        }

        $('select[name=id_kategori_kendaraan]').change(function() {
            setTarif()
        })

        $(document).on('input', 'input[name=no_kendaraan]', function() {
            $(this).val($(this).val().replace(/[^A-Za-z0-9]+/g, '').toUpperCase())
        })
    </script>
</body>

</html>