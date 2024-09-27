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
                                <div class="card-title">Kategori Kendaraan
                                </div>
                                <div class="pull-right">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-cons" data-target="#myModal" data-toggle="modal">
                                            <i class="fa fa-plus"></i> Tambah Kategori Kendaraan
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
                                                <th style="width: 10%;">Kode</th>
                                                <th>Nama</th>
                                                <th style="width: 10%;">Tarif</th>
                                                <th>Jenis Tarif</th>
                                                <th style="width: 5%;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($kategori_kendaraan as $k) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $k->kode_kategori_kendaraan ?></td>
                                                    <td><?php echo $k->nama_kategori_kendaraan ?></td>
                                                    <td class="text-right"><?php echo number_format((string)$k->tarif_kategori_kendaraan, 0, "", ".") ?></td>
                                                    <td><?php echo $k->jenis_tarif_kategori_kendaraan ?></td>
                                                    <td class="text-right">
                                                        <div class="btn-group btn-group-xs sm-m-t-10">
                                                            <button type="button" class="btn btn-default" onclick="edit(<?php echo $k->id_kategori_kendaraan ?>)"><i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-default" onclick="hapus(<?php echo $k->id_kategori_kendaraan ?>)"><i class="fa fa-trash"></i>
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
                                        <h5>Data <span class="semi-bold">Kategori Kendaraan</span></h5>
                                    </div>
                                    <form role="form" name="form-kategori-kendaraan" method="POST" action="<?php echo base_url() ?>kategoriKendaraan/save">
                                        <input type="hidden" name="id_kategori_kendaraan">
                                        <div class="modal-body">
                                            <div class="form-group-attached">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Kode</label>
                                                            <input name="kode_kategori_kendaraan" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input name="nama_kategori_kendaraan" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Tarif</label>
                                                        <input name="tarif_kategori_kendaraan" type="text" class="form-control text-right" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Jenis Tarif</label>
                                                        <input name="jenis_tarif_kategori_kendaraan" type="text" class="form-control" required>
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

            $('input[name=tarif_kategori_kendaraan]').keyup(function() {
                if ($(this).val().trim().length > 0) {
                    $(this).val(formatAngkaRp($(this).val()))
                }
            })
        })

        $('#myModal').on('hidden.bs.modal', function() {
            $('input[name=id_kategori_kendaraan]').val('')
            $('input[name=kode_kategori_kendaraan]').val('')
            $('input[name=nama_kategori_kendaraan]').val('')
            $('input[name=tarif_kategori_kendaraan]').val('')
            $('input[name=jenis_tarif_kategori_kendaraan]').val('')
        })

        function edit(id) {
            axios.get('<?php echo base_url() ?>kategoriKendaraan/get/' + id)
                .then(res => {
                    const data = res.data[0]
                    $('input[name=id_kategori_kendaraan]').val(data.id_kategori_kendaraan)
                    $('input[name=kode_kategori_kendaraan]').val(data.kode_kategori_kendaraan)
                    $('input[name=nama_kategori_kendaraan]').val(data.nama_kategori_kendaraan)
                    $('input[name=tarif_kategori_kendaraan]').val(formatAngka(data.tarif_kategori_kendaraan))
                    $('input[name=jenis_tarif_kategori_kendaraan]').val(data.jenis_tarif_kategori_kendaraan)

                    $('#myModal').modal('show')
                })
                .catch(err => alert('Terjadi kesalahan, ' + err))
        }

        function hapus(id) {
            Swal.fire({
                title: 'Hapus Data?',
                text: 'Hapus Data Kategori Kendaraan?',
                type: 'warning',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    location.assign('<?php echo base_url() ?>kategoriKendaraan/delete/' + id)
                }
            })
        }
    </script>
</body>

</html>