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
                <div class="card-title">Karyawan
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <button class="btn btn-primary btn-cons" data-target="#myModal" data-toggle="modal">
                      <i class="fa fa-plus"></i> Tambah Karyawan
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
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Jabatan</th>
                        <th style="width: 5%;">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                      foreach ($karyawan as $k) { ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $k->nik_karyawan ?></td>
                          <td><?php echo $k->nama_karyawan ?></td>
                          <td><?php echo $k->username_karyawan ?></td>
                          <td><?php echo $k->alamat_karyawan ?></td>
                          <td><?php echo $k->telepon_karyawan ?></td>
                          <td><?php echo $k->nama_jabatan ?></td>
                          <td class="text-right">
                            <div class="btn-group btn-group-xs sm-m-t-10">
                              <button type="button" class="btn btn-default" onclick="edit(<?php echo $k->id_karyawan ?>)"><i class="fa fa-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-default" onclick="hapus(<?php echo $k->id_karyawan ?>)"><i class="fa fa-trash"></i>
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
                    <h5>Data <span class="semi-bold">Karyawan</span></h5>
                  </div>
                  <form role="form" name="form-karyawan" method="POST" action="<?php echo base_url() ?>karyawan/save">
                    <input type="hidden" name="id_karyawan">
                    <div class="modal-body">
                      <div class="form-group-attached">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>NIK Karyawan</label>
                              <input name="nik_karyawan" type="text" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nama Karyawan</label>
                              <input name="nama_karyawan" type="text" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Alamat Karyawan</label>
                              <textarea name="alamat_karyawan" class="form-control" rows="3"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Telepon Karyawan</label>
                              <input name="telepon_karyawan" type="tel" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Username</label>
                              <input name="username_karyawan" type="text" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Password</label>
                              <input name="password_karyawan" type="password" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Jabatan</label>
                              <select name="id_jabatan" class="form-control">
                                <option value=""></option>
                                <?php foreach ($jabatan as $j) { ?>
                                  <option value="<?php echo $j->id_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                                <?php } ?>
                              </select>
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

    $('#myModal').on('hidden.bs.modal', function() {
      $('input[name=id_karyawan]').val('')
      $('input[name=nik_karyawan]').val('')
      $('input[name=nama_karyawan]').val('')
      $('textarea[name=alamat_karyawan]').val('')
      $('input[name=telepon_karyawan]').val('')
      $('input[name=username_karyawan]').val('')
      $('input[name=password_karyawan]').val('')
      $('select[name=id_jabatan]').val('')
      $('input[name=password_karyawan]').attr('required', true)
    })

    function edit(id) {
      axios.get('<?php echo base_url() ?>karyawan/get/' + id)
        .then(res => {
          const data = res.data[0]
          $('input[name=id_karyawan]').val(data.id_karyawan)
          $('input[name=nik_karyawan]').val(data.nik_karyawan)
          $('input[name=nama_karyawan]').val(data.nama_karyawan)
          $('textarea[name=alamat_karyawan]').val(data.alamat_karyawan)
          $('input[name=telepon_karyawan]').val(data.telepon_karyawan)
          $('input[name=username_karyawan]').val(data.username_karyawan)
          $('select[name=id_jabatan]').val(data.id_jabatan)
          $('input[name=password_karyawan]').attr('required', false)

          $('#myModal').modal('show')
        })
        .catch(err => alert('Terjadi kesalahan, ' + err))
    }

    function hapus(id) {
      Swal.fire({
        title: 'Hapus Data?',
        text: 'Hapus Data Karyawan?',
        type: 'warning',
        showCancelButton: true
      }).then((result) => {
        if (result.value) {
          location.assign('<?php echo base_url() ?>karyawan/delete/' + id)
        }
      })
    }
  </script>
</body>

</html>