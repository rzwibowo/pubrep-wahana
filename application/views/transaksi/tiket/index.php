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
                                <div class="card-title">Transaksi Tiket
                                </div>
                            </div>
                            <div class="card-body">
                                <input class="main-data" name="id_transaksi_tiket" value="<?php if (isset($customer)) echo $customer->id_transaksi_tiket ?>" type="hidden">

                                <!-- data customer -->
                                <input class="main-data" name="id_customer" value="<?php if (isset($customer)) echo $customer->id_customer ?>" type="hidden">
                                <input class="main-data" name="id_kabupaten" type="hidden">
                                <input class="main-data" name="id_propinsi" type="hidden">
                                <!-- data customer selesai -->

                                <!-- status tiket -->
                                <input type="hidden" name="status_transaksi_tiket" value="<?php if (isset($status_transaksi_tiket)) {
                                                                                                echo $status_transaksi_tiket;
                                                                                            } ?>">
                                <!-- status tiket selesai -->

                                <div class="row">
                                    <div class="col-md-6 offset-md-2">
                                        <div class="input-group mb-3">
                                            <input name="nama_customer" type="text" class="form-control main-data" placeholder="Nama Customer" value="<?php if (isset($customer)) echo $customer->nama_customer ?>" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" data-target="#searchModal" data-toggle="modal">
                                                    &hellip;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button class="btn btn-secondary btn-cons mb-3" data-target="#myModal" data-toggle="modal">
                                            <i class="fa fa-plus"></i> Tambah Customer
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 offset-md-2">
                                        <div class="form-group">
                                            <label>Propinsi</label>
                                            <input name="nama_propinsi" type="text" class="form-control main-data" value="<?php if (isset($customer)) echo $customer->nama_propinsi ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <input name="nama_kabupaten" type="text" class="form-control main-data" value="<?php if (isset($customer)) echo $customer->nama_kabupaten ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 offset-md-2">
                                        <div class="form-group">
                                            <label>No. Tiket</label>
                                            <input name="no_transaksi_tiket" type="text" class="form-control main-data" value="<?php echo $no_transaksi_tiket ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input name="biaya" type="text" class="form-control text-right main-data" value="5.000">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input name="keterangan_transaksi_tiket" type="text" class="form-control main-data" value="<?php echo $keterangan_transaksi_tiket ?>">
                                        </div>
                                    </div>
                                </div>
                                <div id="rombongan">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header separator">
                                                    <div class="card-title">Data Rombongan
                                                    </div>
                                                </div>
                                                <div class="card-body separator">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>NIK Rombongan</label>
                                                                <input v-model="rombongan_temp.nik_rombongan" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Nama Rombongan</label>
                                                                <input v-model="rombongan_temp.nama_rombongan" type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <div class="radio radio-primary">
                                                                    <input v-model="rombongan_temp.jenis_kelamin_rombongan" type="radio" value="L" name="jenis_kelamin_rombongan" id="L">
                                                                    <label for="L">Laki-laki</label>
                                                                    <input v-model="rombongan_temp.jenis_kelamin_rombongan" type="radio" value="P" name="jenis_kelamin_rombongan" id="P">
                                                                    <label for="P">Perempuan</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Telepon Rombongan</label>
                                                                <input v-model="rombongan_temp.telepon_rombongan" type="tel" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Alamat Rombongan</label>
                                                                <input type="text" v-model="rombongan_temp.alamat_rombongan" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Biaya Personel</label>
                                                                <input type="text" v-model="rombongan_temp.biaya_personel" class="form-control text-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <button class="btn btn-secondary" @click="edit_index = null" v-show="edit_index !== null">
                                                                Batal
                                                            </button>
                                                            <button class="btn btn-primary" @click="tambah" :disabled="Object.keys(rombongan_temp).length === 0">
                                                                {{ edit_index === null ? 'Tambah' : 'Simpan Ubahan' }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-body table-responsive separator">
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
                                                                <th style="width: 10%;">Biaya</th>
                                                                <th style="width: 5%;">Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(rombongan, index) in rombongans" :key="index" :class="{'row-edit': edit_index === index}">
                                                                <td>{{ index + 1 }}</td>
                                                                <td>{{ rombongan.nik_rombongan }}</td>
                                                                <td>{{ rombongan.nama_rombongan }}</td>
                                                                <td>{{ rombongan.jenis_kelamin_rombongan }}</td>
                                                                <td>{{ rombongan.telepon_rombongan }}</td>
                                                                <td>{{ rombongan.alamat_rombongan }}</td>
                                                                <td class="text-right">{{ rombongan.biaya_personel }}</td>
                                                                <td class="text-right">
                                                                    <div class="btn-group btn-group-xs sm-m-t-10">
                                                                        <button type="button" class="btn btn-default" @click="ubah(index)" v-if="!rombongan.id_transaksi_tiket_detail"><i class="fa fa-pencil"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-default" @click="hapus(index)"><i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-body separator">
                                                    <h3>Perlengkapan</h3>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 3%;"></th>
                                                                    <th>Nama Perlengkapan</th>
                                                                    <th style="width: 5%;">Dibawa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $j = 1;
                                                                foreach ($penunjang as $p) { ?>
                                                                    <tr>
                                                                        <td><?php echo $j ?></td>
                                                                        <td><?php echo $p->nama_penunjang ?></td>
                                                                        <td class="text-center">
                                                                            <input type="checkbox" value="<?php echo $p->id_penunjang ?>" name="<?php echo $p->id_penunjang ?>" v-model="perlengkapans_" @click="setJumlah(<?php echo ($j - 1) . ', ' . $p->id_penunjang ?>)">
                                                                        </td>
                                                                    </tr>
                                                                <?php $j++;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <button class="btn btn-primary" @click="simpan">
                                                                Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <h5>Data <span class="semi-bold">Customer</span></h5>
                                        <p id="detail-customer"></p>
                                    </div>
                                    <form role="form" name="form-customer" onsubmit="simpanCustomer()">
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

                        <div class="modal fade stick-up" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-custom-width">
                                <div class="modal-content">
                                    <div class="modal-header clearfix text-left">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                        </button>
                                        <h5>Pencarian <span class="semi-bold">Customer</span></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <input type="search" name="pencarian" class="form-control" placeholder="NIK/Nama/Alamat Customer">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="btn-cari">
                                                            Cari
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="progress" id="proses" style="display: none;">
                                                    <div class="progress-bar-indeterminate"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table" id="searchTable">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 3%;"></th>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th style="width: 3%;"><abbr title="Jenis Kelamin">JK</abbr></th>
                                                                <th>Alamat</th>
                                                                <th style="width: 5%;">Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
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
        let tabel_utama
        const col_def = [{
            orderable: false,
            targets: [-1]
        }]

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

            tabel_utama = $('#searchTable').DataTable({
                searching: false,
                columnDefs: col_def
            })

            list100()
        })

        function list100() {
            $('#proses').show()

            axios.get('<?php echo base_url() ?>customer/list100/')
                .then(res => {
                    tabel_utama.destroy()

                    const data_customer = res.data.map((item, index) => {
                        return `<tr>
                            <td width="3">${index + 1}</td>
                            <td>${item.nik_customer}</td>
                            <td>${item.nama_customer}</td>
                            <td>${item.jenis_kelamin_customer}</td>
                            <td>${item.alamat_customer}, ${item.nama_kabupaten}, ${item.nama_propinsi}</td>
                            <td class="text-right">
                                <button class="btn btn-default btn-sm" 
                                    onclick="pilih(${item.id_customer}, '${item.nama_customer}', ${item.id_kabupaten}, ${item.id_propinsi}, '${item.nama_kabupaten}', '${item.nama_propinsi}')" 
                                    title="Pilih">
                                    <i class="fa fa-check"></i>
                                </button>
                            </td>
                        </tr>`
                    }).join('')
                    $('#searchTable tbody').html(data_customer)

                    tabel_utama = $('#searchTable').DataTable({
                        searching: false,
                        columnDefs: col_def
                    })
                })
                .catch(err => alert('Terjadi kesalahan, ' + err))
                .then(() => $('#proses').hide())
        }

        $('#myModal').on('hidden.bs.modal', function() {
            $('form[name=form-customer] input[name=nik_customer]').val('')
            $('form[name=form-customer] input[name=nama_customer]').val('')
            $('form[name=form-customer] input[name=jenis_kelamin_customer]').prop('checked', false)
            $('form[name=form-customer] input[name=telepon_customer]').val('')
            $('form[name=form-customer] textarea[name=alamat_customer]').val('')
            $('form[name=form-customer] select[name=id_propinsi]').val('')
            $('form[name=form-customer] select[name=id_kabupaten]').html('')
            $('form[name=form-customer] select[name=id_kabupaten]').val('')
        })

        function loadKabupaten() {
            const id_propinsi = $('form[name=form-customer] select[name=id_propinsi]').val()

            if (id_propinsi) {
                $('#proses').show()
                $('form[name=form-customer] select[name=id_kabupaten]').prop('disabled', true)

                axios.get('<?php echo base_url() ?>kabupaten/getByProp/' + id_propinsi)
                    .then(res => {
                        const data = res.data
                        const data_kabupaten = data.map(item => {
                            return `<option value="${item.id_kabupaten}">
                            ${item.nama_kabupaten}
                        </option>`
                        }).join('')

                        $('form[name=form-customer] select[name=id_kabupaten]').html(data_kabupaten)
                    })
                    .catch(err => alert('Terjadi kesalahan, ' + err))
                    .then(() => {
                        $('#proses').hide()
                        $('form[name=form-customer] select[name=id_kabupaten]').prop('disabled', false)
                    })
            } else {
                $('form[name=form-customer] select[name=id_kabupaten]').html('')
            }
        }

        $('#btn-cari').click(function() {
            cari()
        })

        $('input[name=pencarian]').keyup(function() {
            cari()
        })

        function cari() {
            $('#proses').show()
            const pencarian = $('input[name=pencarian]').val()

            if (pencarian.length >= 3) {
                axios.get('<?php echo base_url() ?>customer/search/' + pencarian)
                    .then(res => {
                        tabel_utama.destroy()

                        const data_customer = res.data.map((item, index) => {
                            return `<tr>
                                <td>${index + 1}</td>
                                <td>${item.nik_customer}</td>
                                <td>${item.nama_customer}</td>
                                <td>${item.jenis_kelamin_customer}</td>
                                <td>${item.alamat_customer}, ${item.nama_kabupaten}, ${item.nama_propinsi}</td>
                                <td class="text-right">
                                    <button class="btn btn-default btn-sm" 
                                        onclick="pilih(${item.id_customer}, '${item.nama_customer}', ${item.id_kabupaten}, ${item.id_propinsi}, '${item.nama_kabupaten}', '${item.nama_propinsi}')" 
                                        title="Pilih">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>`
                        }).join('')
                        $('#searchTable tbody').html(data_customer)

                        tabel_utama = $('#searchTable').DataTable({
                            searching: false,
                            columnDefs: [{
                                orderable: false,
                                targets: [-1]
                            }]
                        })
                    })
                    .catch(err => alert('Terjadi kesalahan, ' + err))
                    .then(() => $('#proses').hide())
            } else {
                list100()
            }
        }

        function pilih(id_customer, nama_customer, id_kabupaten, id_propinsi, nama_kabupaten, nama_propinsi) {
            $('input[name=id_customer].main-data').val(id_customer)
            $('input[name=nama_customer].main-data').val(nama_customer)

            $('input[name=id_kabupaten].main-data').val(id_kabupaten)
            $('input[name=nama_kabupaten].main-data').val(nama_kabupaten)

            $('input[name=id_propinsi].main-data').val(id_propinsi)
            $('input[name=nama_propinsi].main-data').val(nama_propinsi)

            $('#searchModal').modal('hide')
        }

        function simpanCustomer() {
            event.preventDefault()

            const data = {
                nik_customer: $('form[name=form-customer] input[name=nik_customer]').val(),
                nama_customer: $('form[name=form-customer] input[name=nama_customer]').val(),
                jenis_kelamin_customer: $('form[name=form-customer] input[name=jenis_kelamin_customer]').val(),
                telepon_customer: $('form[name=form-customer] input[name=telepon_customer]').val(),
                alamat_customer: $('form[name=form-customer] textarea[name=alamat_customer]').val(),
                id_propinsi: $('form[name=form-customer] select[name=id_propinsi]').val(),
                id_kabupaten: $('form[name=form-customer] select[name=id_kabupaten]').val()
            }

            axios.post('<?php echo base_url() ?>customer/saveAjax/',
                    data)
                .then(res => {
                    if (res.data.status === 'save-ok') {
                        pilih(res.data.id, data.nama_customer.trim(), data.id_kabupaten, data.id_propinsi,
                            $('form[name=form-customer] select[name=id_kabupaten] option:selected').text().trim(),
                            $('form[name=form-customer] select[name=id_propinsi] option:selected').text().trim(),
                        )

                        $('#myModal').modal('hide')

                        Toast.fire({
                            type: 'success',
                            title: 'Berhasil simpan data'
                        })
                    } else if (res.data.status === 'save-dup') {
                        Toast.fire({
                            type: 'error',
                            title: 'NIK sudah ada'
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

        $('input[name=biaya]').keyup(function() {
            if ($(this).val().trim().length > 0) {
                $(this).val(formatAngkaRp($(this).val()))
            }
        })

        const rombongan_script = new Vue({
            el: '#rombongan',
            data: function() {
                return {
                    rombongan_temp: {
                        biaya_personel: '5.000',
                        id_transaksi_tiket_detail: ''
                    },
                    rombongans: [<?php if (isset($detail_rombongan)) {
                                        foreach ($detail_rombongan as $r) {
                                            echo '{';
                                            echo 'id_transaksi_tiket: ';
                                            echo isset($customer) ? $customer->id_transaksi_tiket : '""';
                                            echo ',';
                                            echo 'id_transaksi_tiket_detail: ' . $r->id_transaksi_tiket_detail . ',';
                                            echo 'nik_rombongan: "' . $r->nik_rombongan . '",';
                                            echo 'nama_rombongan: "' . $r->nama_rombongan . '",';
                                            echo 'telepon_rombongan: "' . $r->telepon_rombongan . '",';
                                            echo 'alamat_rombongan: "' . $r->alamat_rombongan . '",';
                                            echo 'jenis_kelamin_rombongan: "' . $r->jenis_kelamin_rombongan . '",';
                                            echo 'biaya_personel: "' . number_format((string)$r->biaya_personel, 0, "", ".") . '"';
                                            echo '},';
                                        }
                                    } ?>],
                    perlengkapans: [<?php foreach ($penunjang as $p) {
                                        echo '{';
                                        echo 'id_transaksi_penunjang: ';
                                        echo isset($p->id_transaksi_penunjang) && $p->id_transaksi_penunjang != '' ? $p->id_transaksi_penunjang : '""';
                                        echo ',';
                                        echo 'id_penunjang: ' . $p->id_penunjang . ',';
                                        echo 'jumlah_penunjang: ' . $p->jumlah_penunjang . ',';
                                        echo '},';
                                    } ?>],
                    perlengkapans_: [<?php if (isset($penunjang)) {
                                            foreach ($penunjang as $p) {
                                                echo isset($p->id_transaksi_penunjang) && $p->id_transaksi_penunjang != '' && (int)$p->jumlah_penunjang != 0 ? $p->id_penunjang . ',' : '';
                                            }
                                        } ?>],
                    id_hapuses: [],
                    edit_index: null
                }
            },
            watch: {
                'rombongan_temp.biaya_personel': function(val) {
                    this.rombongan_temp.biaya_personel = formatAngkaRp(val)
                }
            },
            methods: {
                tambah: function() {
                    if (this.edit_index !== null) {
                        this.rombongans.splice(this.edit_index, 1, this.rombongan_temp)
                        this.edit_index = null
                    } else {
                        this.rombongans.push(this.rombongan_temp)
                    }
                    this.rombongan_temp = {
                        biaya_personel: '5.000',
                        id_transaksi_tiket_detail: ''
                    }
                },
                ubah: function(index) {
                    const data_edit = this.rombongans[index]
                    this.rombongan_temp.nik_rombongan = data_edit.nik_rombongan
                    this.rombongan_temp.nama_rombongan = data_edit.nama_rombongan
                    this.rombongan_temp.jenis_kelamin_rombongan = data_edit.jenis_kelamin_rombongan
                    this.rombongan_temp.telepon_rombongan = data_edit.telepon_rombongan
                    this.rombongan_temp.alamat_rombongan = data_edit.alamat_rombongan
                    this.edit_index = index
                },
                hapus: function(index) {
                    if (this.rombongans[index].id_transaksi_tiket_detail) {
                        this.id_hapuses.push(this.rombongans[index].id_transaksi_tiket_detail)
                    }
                    this.rombongans.splice(index, 1)
                },
                simpan: function() {
                    const biaya_total = this.rombongans.reduce((total, item) => {
                        return total + parseInt(item.biaya_personel.toString().replace(/\./g, ''))
                    }, 0) + parseInt($('input[name=biaya]').val().toString().replace(/\./g, ''))

                    const rombongan = this.rombongans.map(item => {
                        let item_ = item
                        item_.biaya_personel = parseInt(item.biaya_personel.toString().replace(/\./g, ''))
                        return item_
                    })

                    const data = {
                        id_transaksi_tiket: $('input[name=id_transaksi_tiket]').val(),
                        no_transaksi_tiket: $('input[name=no_transaksi_tiket]').val(),
                        id_customer: $('input[name=id_customer].main-data').val(),
                        detail_transaksi_tiket: rombongan,
                        transaksi_penunjang: this.perlengkapans,
                        grand_total_transaksi_tiket: biaya_total,
                        status_transaksi_tiket: $('input[name=status_transaksi_tiket]').val(),
                        keterangan_transaksi_tiket: $('input[name=keterangan_transaksi_tiket]').val()
                    }

                    if ($('input[name=id_transaksi_tiket]').val()) {
                        data.id_hapuses = this.id_hapuses
                    }

                    if (!data.id_customer) {
                        Swal.fire({
                            type: 'error',
                            title: 'Data Tidak Lengkap',
                            text: 'Mohon isikan data customer',
                            showCancelButton: false
                        })
                    } else {
                        axios.post('<?php echo base_url() ?>tiket/save/',
                                data)
                            .then(res => {
                                if (res.data.status === 'save-ok') {
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Berhasil simpan data'
                                    })

                                    const id = $('input[name=id_transaksi_tiket]').val() === '' ?
                                        res.data.id :
                                        $('input[name=id_transaksi_tiket]').val()

                                    this.resetForm()
                                    window.open('<?php echo base_url() ?>tiket/cetak/' + id)

                                    if ($('input[name=id_transaksi_tiket]').val()) {
                                        if ($('input[name=status_transaksi_tiket]').val() !== 'P') {
                                            location.replace('<?php echo base_url() ?>tiket/rekap')
                                        } else {
                                            location.reload()
                                        }
                                    }
                                } else {
                                    Toast.fire({
                                        type: 'error',
                                        title: 'Gagal simpan data'
                                    })
                                }
                            })
                            .catch(err => alert('Terjadi kesalahan, ' + err))
                    }

                },
                setJumlah: function(index, id_penunjang) {
                    const cek_perlengkapan = this.perlengkapans_.filter(item => {
                        return parseInt(item) === id_penunjang
                    })
                    if (cek_perlengkapan.length === 1) {
                        this.perlengkapans[index].jumlah_penunjang = 0
                    } else {
                        this.perlengkapans[index].jumlah_penunjang = 1
                    }
                },
                resetForm: function() {
                    this.rombongans = []
                    this.perlengkapans.forEach((_item, index) => {
                        this.perlengkapans[index].jumlah_penunjang = 0
                        this.perlengkapans[index].id_transaksi_penunjang = ''
                    })
                    this.perlengkapans_ = []
                    $('input[name=id_customer].main-data').val('')
                    $('input[name=nama_customer].main-data').val('')

                    $('input[name=id_kabupaten].main-data').val('')
                    $('input[name=nama_kabupaten].main-data').val('')

                    $('input[name=id_propinsi].main-data').val('')
                    $('input[name=nama_propinsi].main-data').val('')
                }
            }
        })
    </script>
</body>

</html>