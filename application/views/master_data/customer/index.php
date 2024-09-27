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
                <div class="card-title">Customer
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <button class="btn btn-primary btn-cons" data-target="#myModal" data-toggle="modal">
                      <i class="fa fa-plus"></i> Tambah Customer
                    </button>
                  </div>
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
                        <th>NIK</th>
                        <th>Nama</th>
                        <th style="width: 3%;"><abbr title="Jenis Kelamin">JK</abbr></th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th style="width: 5%;">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                      foreach ($customer as $c) { ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $c->nik_customer ?></td>
                          <td><?php echo $c->nama_customer ?></td>
                          <td><?php echo $c->jenis_kelamin_customer ?></td>
                          <td><?php echo $c->telepon_customer ?></td>
                          <td><?php echo $c->alamat_customer . ', ' . $c->nama_kabupaten . ', ' . $c->nama_propinsi  ?></td>
                          <td class="text-right">
                            <div class="btn-group btn-group-xs sm-m-t-10">
                              <button type="button" class="btn btn-default" onclick="edit(<?php echo $c->id_customer ?>)"><i class="fa fa-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-default" onclick="hapus(<?php echo $c->id_customer ?>)"><i class="fa fa-trash"></i>
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
                    <h5>Data <span class="semi-bold">Customer</span></h5>
                  </div>
                  <form role="form" name="form-customer" method="POST" action="<?php echo base_url() ?>customer/save">
                    <input type="hidden" name="id_customer">
                    <div class="modal-body">
                      <div class="form-group-attached">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>NIK Customer</label>
                              <input name="nik_customer" type="text" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nama Customer</label>
                              <input name="nama_customer" type="text" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <div class="radio radio-primary">
                                <input type="radio" value="L" name="jenis_kelamin_customer" id="L">
                                <label for="L">Laki-laki</label>
                                <input type="radio" value="P" name="jenis_kelamin_customer" id="P">
                                <label for="P">Perempuan</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Telepon Customer</label>
                              <input name="telepon_customer" type="tel" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Alamat Customer</label>
                              <textarea name="alamat_customer" class="form-control" rows="3"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Propinsi</label>
                              <select name="id_propinsi" class="form-control" onchange="loadKabupaten()">
                                <option value=""></option>
                                <?php foreach ($propinsi as $p) { ?>
                                  <option value="<?php echo $p->id_propinsi ?>"><?php echo $p->nama_propinsi ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="progress" id="proses" style="display: none;">
                              <div class="progress-bar-indeterminate"></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Kabupaten</label>
                              <select name="id_kabupaten" class="form-control">
                                <option value=""></option>
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
        case 'save-dup':
          Toast.fire({
            type: 'error',
            title: 'NIK sudah ada'
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
            targets: [0, 6]
          },
          {
            orderable: false,
            targets: [6]
          }
        ]
      })

    })

    $('#myModal').on('hidden.bs.modal', function() {
      $('input[name=id_customer]').val('')
      $('input[name=nik_customer]').val('')
      $('input[name=nama_customer]').val('')
      $('input[name=jenis_kelamin_customer]').prop('checked', false)
      $('input[name=telepon_customer]').val('')
      $('textarea[name=alamat_customer]').val('')
      $('select[name=id_propinsi]').val('')
      $('select[name=id_kabupaten]').html('')
      $('select[name=id_kabupaten]').val('')
    })

    function edit(id) {
      let id_propinsi = null
      let id_kabupaten = null
      axios.get('<?php echo base_url() ?>customer/get/' + id)
        .then(res => {
          const data = res.data[0]
          $('input[name=id_customer]').val(data.id_customer)
          $('input[name=nik_customer]').val(data.nik_customer)
          $('input[name=nama_customer]').val(data.nama_customer)
          $('input[name=jenis_kelamin_customer][value=' + data.jenis_kelamin_customer + ']').prop('checked', true)
          $('textarea[name=alamat_customer]').val(data.alamat_customer)
          $('input[name=telepon_customer]').val(data.telepon_customer)
          $('select[name=id_propinsi]').val(data.id_propinsi)

          id_propinsi = data.id_propinsi
          id_kabupaten = data.id_kabupaten

          return axios.get('<?php echo base_url() ?>kabupaten/getByProp/' + id_propinsi)
        })
        .then(res => {
          const data = res.data
          const data_kabupaten = data.map(item => {
            return `<option value="${item.id_kabupaten}">
              ${item.nama_kabupaten}
            </option>`
          }).join('')

          $('select[name=id_kabupaten]').html(data_kabupaten)
          $('select[name=id_kabupaten]').val(id_kabupaten)
          $('#myModal').modal('show')
        })
        .catch(err => alert('Terjadi kesalahan, ' + err))
    }

    function hapus(id) {
      Swal.fire({
        title: 'Hapus Data',
        text: 'Hapus Data Customer?',
        type: 'warning',
        showCancelButton: true
      }).then((result) => {
        if (result.value) {
          location.assign('<?php echo base_url() ?>customer/delete/' + id)
        }
      })
    }

    function loadKabupaten() {
      const id_propinsi = $('select[name=id_propinsi]').val()

      if (id_propinsi) {
        $('#proses').show()
        $('select[name=id_kabupaten]').prop('disabled', true)

        axios.get('<?php echo base_url() ?>kabupaten/getByProp/' + id_propinsi)
          .then(res => {
            const data = res.data
            const data_kabupaten = data.map(item => {
              return `<option value="${item.id_kabupaten}">
              ${item.nama_kabupaten}
            </option>`
            }).join('')

            $('select[name=id_kabupaten]').html(data_kabupaten)
          })
          .catch(err => alert('Terjadi kesalahan, ' + err))
          .then(() => {
            $('#proses').hide()
            $('select[name=id_kabupaten]').prop('disabled', false)
          })
      } else {
        $('select[name=id_kabupaten]').html('')
      }
    }
  </script>
</body>

</html>