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
                                <div class="card-title">
                                    Transaksi Parkir
                                </div>
                            </div>
                            <form role="form" action="<?php echo base_url() ?>parkir/save" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input id="tanggal" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jam</label>
                                                <input id="jam" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group pr-2">
                                                <label>Nomor Kendaraan</label>
                                                <input name="no_kendaraan" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Kategori Kendaraan</label>
                                                <select name="id_kategori_kendaraan" class="form-control" required>
                                                    <?php foreach ($kategori_kendaraan as $kk) { ?>
                                                        <option value="<?php echo $kk->id_kategori_kendaraan ?>" data-tarif="<?php echo $kk->tarif_kategori_kendaraan ?>">
                                                            <?php echo $kk->kode_kategori_kendaraan . ' | ' . $kk->nama_kategori_kendaraan ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Tarif</label>
                                                <input name="nilai_transaksi_parkir" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button class="btn btn-success btn-cons m-b-10 btn-block" type="submit" name="submitTransaksi" value="in">
                                                <i class="pg-arrow_down"></i>
                                                <span class="bold">Masuk</span>
                                            </button>
                                        </div>
                                        <div class="col-md-3 offset-md-6 text-right">
                                            <button class="btn btn-danger btn-cons m-b-10 btn-block" type="submit" name="submitTransaksi" value="out">
                                                <i class="pg-arrow_up"></i>
                                                <span class="bold">Keluar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                case 'masuk-ok':
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil masuk'
                    })
                    window.open('<?php echo base_url() ?>parkir/cetak/<?php echo $this->session->flashdata('last_id') ?>')
                    break
                case 'masuk-err':
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal keluar'
                    })
                    break
                case 'keluar-ok':
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil simpan data'
                    })
                    break
                case 'keluar-err':
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal keluar'
                    })
                    break
                case 'keluar-invalid':
                    Toast.fire({
                        type: 'error',
                        title: 'Kendaraan belum masuk'
                    })
                    break

                default:
                    break
            }

            function setWaktu() {
                $('#tanggal').val(moment().format('DD-MM-YYYY'))
                $('#jam').val(moment().format('HH:mm:ss'))
            }

            setInterval(() => {
                setWaktu()
            }, 1000)

            function setTarif() {
                const tarif = formatAngka($('select[name=id_kategori_kendaraan]').find(':selected').data('tarif'))
                $('input[name=nilai_transaksi_parkir]').val(tarif)
            }

            setTarif()

            $('select[name=id_kategori_kendaraan]').change(function() {
                setTarif()
            })

            $(document).on('input', 'input[name=no_kendaraan]', function() {
                $(this).val($(this).val().replace(/[^A-Za-z0-9]+/g, '').toUpperCase())
            })

            // $('input[name=no_kendaraan]').autocomplete({
            // source: "<?php //echo base_url() 
                        ?>transaksi/get5NoKendaraan/" + $('input[name=no_kendaraan]').val(),
            //     minLength: 3,
            //     focus: function(event, ui) {
            //         $('input[name=no_kendaraan]').val(ui.item.no_kendaraan)
            //         return false
            //     },
            // }).autocomplete("instance")._renderItem = function(ul, item) {
            //     return $("<li>")
            //         .append("<div>" + item.no_kendaraan + "</div>")
            //         .appendTo(ul)
            // };
        })
    </script>
</body>

</html>