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
                                <div class="card-title">Transaksi Booking
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="main-table">
                                        <thead>
                                            <tr>
                                                <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
											Comman Practice Followed
											-->
                                                <th style="width: 3%;"></th>
                                                <th style="width: 15%;">No Tiket</th>
                                                <th>Tanggal Pendakian</th>
                                                <th>Nama Customer</th>
                                                <th>Alamat</th>
                                                <th style="width: 15%;">Keterangan</th>
                                                <th style="width: 8%;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($booking as $b) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $b->no_transaksi_tiket ?></td>
                                                    <td><?php echo $b->tanggal_transaksi_tiket ?></td>
                                                    <td><?php echo $b->nama_customer ?></td>
                                                    <td><?php echo $b->alamat_customer . ', ' . $b->nama_kabupaten . ', ' . $b->nama_propinsi  ?></td>
                                                    <td><?php echo $b->keterangan_transaksi_tiket ?></td>
                                                    <td class="text-right">
                                                        <div class="btn-group btn-group-xs sm-m-t-10">
                                                            <a class="btn btn-default" href="<?php echo base_url() ?>tiket/index/<?php echo $b->id_transaksi_tiket ?>">
                                                                <i class="fa fa-paper-plane"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-default" onclick="hapus(<?php echo $b->id_transaksi_tiket ?>)"><i class="fa fa-trash"></i>
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


        async function hapus(id) {
            const { value: password } = await Swal.fire({
                title: 'Hapus data',
                text: 'Masukkan password untuk konfirmasi hapus',
                input: 'password',
                inputPlaceholder: 'Masukkan password',
                inputAttributes: {
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                showCancelButton: true
            })

            if (password) {
                axios.post('<?php echo base_url() ?>tiket/deleteAjax/', {
                        id_transaksi_tiket: id,
                        password_karyawan: password
                    })
                    .then(res => {
                        if (res.data.status === 'delete-ok') {
                            Toast.fire({
                                type: 'success',
                                title: 'Berhasil hapus data'
                            })
                            location.reload()
                        } else if (res.data.status === 'delete-pass') {
                            Toast.fire({
                                type: 'error',
                                title: 'Password salah'
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: 'Gagal simpan data'
                            })
                        }
                    })
                    .catch(err => alert('Terjadi kesalahan, ' + err))
            }

            // Swal.fire({
            //     title: 'Hapus Data?',
            //     text: 'Hapus Data Transaksi Tiket?',
            //     type: 'warning',
            //     showCancelButton: true
            // }).then((result) => {
            //     if (result.value) {
            //         location.assign('<?php echo base_url() ?>tiket/delete/' + id)
            //     }
            // })
        }
    </script>
</body>

</html>