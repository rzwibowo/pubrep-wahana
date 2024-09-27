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
                                <div class="card-title">Galeri Banner
                                </div>
                                <div class="pull-right">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-cons" data-target="#myModal" data-toggle="modal">
                                            <i class="fa fa-plus"></i> Tambah Gambar Banner
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-condensed" id="main-table">
                                        <thead>
                                            <tr>
                                                <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
											Comman Practice Followed
											-->
                                                <th style="width: 3%;"></th>
                                                <th>Preview Gambar</th>
                                                <th>Status</th>
                                                <th style="width: 5%;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($galeri as $g) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td>
                                                        <div class="thumb">
                                                            <img src="<?php echo base_url() . 'assets/img/uploads/' . $g->nama_galeri ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if ($g->status_galeri == 'Y') { ?>
                                                            <a class="text-success" href="<?php echo base_url() ?>galeri/setStatus/<?php echo $g->id_galeri ?>/N">
                                                                <i class="fa fa-toggle-on fa-2x fa-fw"></i> Aktif
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo base_url() ?>galeri/setStatus/<?php echo $g->id_galeri ?>/Y">
                                                                <i class="fa fa-toggle-off fa-2x fa-fw"></i> Tidak Aktif
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group btn-group-xs sm-m-t-10">
                                                            <button type="button" class="btn btn-default" onclick="hapus(<?php echo $g->id_galeri ?>)"><i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade stick-up" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header clearfix text-left">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                        </button>
                                        <h5>Data <span class="semi-bold">Gambar</span></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group-attached">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-info" role="alert">
                                                        <strong>Info: </strong>Ukuran gambar yang direkomendasikan adalah <strong>1354 x 600 px</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="<?php echo base_url() ?>galeri/save" enctype="multipart/form-data" class="dropzone no-margin" id="frm-gambar">
                                                        <div class="fallback">
                                                            <input name="gambar" type="file" />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 m-t-10 sm-m-t-10 offset-md-8">
                                                <button type="button" id="simpan" class="btn btn-primary btn-block m-t-5" disabled>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- selesai modul -->
                </div>
            </div>
            <?php echo $this->input->get('notifikasi') ?>

            <?php include APPPATH . 'views/main-footer.php'; ?>
        </div>

    </div>

    <?php include APPPATH . 'views/main-js.php'; ?>
    <script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.min.js"></script>
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
            <?php if ($this->input->get('notifikasi') != null) echo "notif='" . $this->input->get('notifikasi') . "';" ?>

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
                case 'status-ok':
                    Toast.fire({
                        type: 'success',
                        title: 'Berhasil ubah status'
                    })
                    break
                case 'status-err':
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal ubah status'
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

            history.replaceState({}, '', 'galeri')

            $('#main-table').DataTable({
                columnDefs: [{
                        searchable: false,
                        targets: [0, -1]
                    },
                    {
                        orderable: false,
                        targets: [-1]
                    }
                ]
            })
        })

        Dropzone.autoDiscover = false
        let img_up

        $('#myModal').on('hidden.bs.modal', function() {
            img_up.removeAllFiles()
            $('#simpan').prop('disabled', true)
        })

        $('#myModal').on('shown.bs.modal', function() {
            img_up = new Dropzone("#frm-gambar", {
                addRemoveLinks: true,
                autoProcessQueue: false,
                maxFiles: 1,
                acceptedFiles: ".jpeg,.jpg,.png"
            })

            img_up.on('addedfile', function(_) {
                $('#simpan').prop('disabled', false)
            })

            img_up.on('success', function(_, res) {
                if (res.status === 'save-ok') {
                    location.replace('<?php echo base_url() ?>galeri?notifikasi=save-ok')
                } else {
                    location.replace('<?php echo base_url() ?>galeri?notifikasi=save-err')
                }
            })

        })

        $('#simpan').click(function() {
            img_up.processQueue()
        })

        function hapus(id) {
            Swal.fire({
                title: 'Hapus Data',
                text: 'Hapus Data Gambar?',
                type: 'warning',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    location.assign('<?php echo base_url() ?>galeri/delete/' + id)
                }
            })
        }
    </script>
</body>

</html>