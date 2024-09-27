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
                                <div class="card-title">Transaksi Biaya
                                </div>
                            </div>
                            <form action="<?php echo base_url() ?>biaya/save" method="POST">
                                <input type="hidden" name="id_transaksi_biaya" value="<?php if (isset($biaya)) echo $biaya->id_transaksi_biaya ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No. Faktur</label>
                                                <input name="no_faktur" type="text" class="form-control" value="<?php echo $no_faktur ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input name="tanggal_transaksi_biaya" type="text" class="form-control" value="<?php if (isset($biaya)) echo $biaya->tanggal_transaksi_biaya ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="id_kategori_biaya" class="form-control" value="<?php if (isset($biaya)) echo $biaya->id_kategori_biaya ?>" required>
                                                    <?php foreach ($kategori_biaya as $k) { ?>
                                                        <option value="<?php echo $k->id_kategori_biaya ?>" 
                                                            <?php if (isset($biaya)) {
                                                                if ($biaya->id_kategori_biaya == $k->id_kategori_biaya) {
                                                                    echo 'selected';
                                                                }
                                                            } ?>>
                                                            <?php echo $k->nama_kategori_biaya ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nilai</label>
                                                <input id="nilai-biaya" name="nilai_transaksi_biaya" type="text" class="form-control text-right" value="<?php if (isset($biaya)) echo $biaya->nilai_transaksi_biaya ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Jenis</label>
                                                <select name="jenis_transaksi_biaya" class="form-control" value="<?php if (isset($biaya)) echo $biaya->jenis_transaksi_biaya ?>" required>
                                                    <?php foreach ($jenis_transaksi_biaya as $j) { ?>
                                                        <option value="<?php echo $j ?>" 
                                                            <?php if (isset($biaya)) {
                                                                if ($biaya->jenis_transaksi_biaya == $j) {
                                                                    echo 'selected';
                                                                }
                                                            } ?>>
                                                            <?php echo $j ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-3 offset-md-9 text-right">
                                            <button class="btn btn-primary btn-cons m-b-10 btn-block" type="submit">
                                                Simpan
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
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000    
        })

        $(document).ready(function() {
            let notif = ''
            <?php if ($this->session->flashdata('notifikasi') != null) echo "notif='" . $this->session->flashdata('notifikasi') . "';" ?>

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

                default:
                    break
            }

            if ($('input[name=tanggal_transaksi_biaya]').val().trim().length < 1) {
                $('input[name=tanggal_transaksi_biaya]').val(moment().format('YYYY-MM-DD'))
            }
            $('input[name=tanggal_transaksi_biaya]').datepicker({
                dateFormat: 'yy-mm-dd'
            })

            $('input[name=nilai_transaksi_biaya]').keyup(function() {
                if ($(this).val().trim().length > 0) {
                    $(this).val(formatAngkaRp($(this).val()))
                }
            })
        })
    </script>
</body>

</html>