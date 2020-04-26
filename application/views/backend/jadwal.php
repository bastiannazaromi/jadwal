<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">

        <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
        <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>


        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title ; ?></h6>
        </div>

        <div class="col-lg-6 col-5 text-right">
          <button type="button" class="btn btn-sm btn-danger float-right mr-2" data-toggle="modal"   data-target="#modalDelete"><i class="fa fa-trash"></i> Hapus Jadwal</button>
          <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Jadwal</button>
          <button type="button" class="btn btn-sm btn-warning float-right mr-2" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i> Edit Jadwal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="table-responsive">
            <table id="example" class="table table-bordered align-items-center" width="100%" cellspacing="0">
                <thead>
                    <tr class="table table-info">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Grup</th>
                        <th>Pos</th>
                        <th>Tempat</th>
                        <th>Shift</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data as $dt) : ?>
                        <tr>
                            <th><?= $i++ ?></th>
                            <td><?= $dt['nama']; ?></td>
                            <td>
                              <?php if ($dt['grup'] == 1) {
                                $grup = 'A';
                              }
                              else if ($dt['grup'] == 2) {
                                $grup = 'B';
                              }
                              else if ($dt['grup'] == 3) {
                                $grup = 'C';
                              }
                              else if ($dt['grup'] == 4) {
                                $grup = 'D';
                              }
                              else if ($dt['grup'] == 5) {
                                $grup = 'E';
                              }
                              else {
                                $grup = 'F';
                              } ; ?>
                               <?= $grup ; ?> 
                            </td>
                            <td><?= $dt['pos'] ; ?></td>
                            <td><?= $dt['tempat'] ; ?></td>
                            <td><?= $dt['shift']; ?></td>
                            <td><?= $dt['tanggal_mulai']; ?></td>
                            <td><?= $dt['tanggal_akhir']; ?></td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('Dashboard/addJadwal'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="grup">Nama Grup</label>
                        <select class="custom-select" id="inputGroupSelect02" name="grup">
                          <option value="1">-- Pilih Grup --</option>
                          <?php foreach ($grup_by as $grup) : ?>
                            <?php if ($grup['grup'] == 1) {
                                $grup_name = 'A';
                              }
                              else if ($grup['grup'] == 2) {
                                $grup_name = 'B';
                              }
                              else if ($grup['grup'] == 3) {
                                $grup_name = 'C';
                              }
                              else if ($grup['grup'] == 4) {
                                $grup_name = 'D';
                              }
                              else if ($grup['grup'] == 5) {
                                $grup_name = 'E';
                              }
                              else if ($grup['grup'] == 6) {
                                $grup_name = 'F';
                              }
                            ?>
                            <option value="<?= $grup['grup'] ; ?>"><?= $grup_name ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shift">Nama Shift</label>
                        <select class="custom-select" id="inputGroupSelect02" name="shift">
                          <option value="1">-- Pilih Shift --</option>
                          <?php foreach ($grup_shift as $shift) : ?>
                            <option value="<?= $shift['id_shift'] ; ?>"><?= $shift['shift'] ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('Dashboard/editJadwal'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="grup">Nama Grup</label>
                        <select class="custom-select" id="inputGroupSelect02" name="grup">
                          <option value="1">-- Pilih Grup --</option>
                          <?php foreach ($jadwal as $dt) : ?>
                            <?php if ($dt['id_grup_karyawan'] == 1) {
                                $grup_name = 'A';
                              }
                              else if ($dt['id_grup_karyawan'] == 2) {
                                $grup_name = 'B';
                              }
                              else if ($dt['id_grup_karyawan'] == 3) {
                                $grup_name = 'C';
                              }
                              else if ($dt['id_grup_karyawan'] == 4) {
                                $grup_name = 'D';
                              }
                              else if ($dt['id_grup_karyawan'] == 5) {
                                $grup_name = 'E';
                              }
                              else if ($dt['id_grup_karyawan'] == 6) {
                                $grup_name = 'F';
                              }
                            ?>
                            <option value="<?= $dt['id_grup_karyawan'] ; ?>"><?= $grup_name ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shift">Nama Shift</label>
                        <select class="custom-select" id="inputGroupSelect02" name="shift">
                          <option value="1">-- Pilih Shift --</option>
                          <?php foreach ($grup_shift as $shift) : ?>
                            <option value="<?= $shift['id_shift'] ; ?>"><?= $shift['shift'] ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-warning">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" onsubmit="ajax_delete(); return false">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="grup">Nama Grup</label>
                        <select class="custom-select" name="grup" id="grup">
                          <option value="0">-- Pilih Grup --</option>
                          <?php foreach ($jadwal as $dt) : ?>
                            <?php if ($dt['id_grup_karyawan'] == 1) {
                                $grup_name = 'A';
                              }
                              else if ($dt['id_grup_karyawan'] == 2) {
                                $grup_name = 'B';
                              }
                              else if ($dt['id_grup_karyawan'] == 3) {
                                $grup_name = 'C';
                              }
                              else if ($dt['id_grup_karyawan'] == 4) {
                                $grup_name = 'D';
                              }
                              else if ($dt['id_grup_karyawan'] == 5) {
                                $grup_name = 'E';
                              }
                              else if ($dt['id_grup_karyawan'] == 6) {
                                $grup_name = 'F';
                              }
                            ?>
                            <option value="<?= $dt['id_grup_karyawan'] ; ?>"><?= $grup_name ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="btn_delete" id="btn_delete" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
  function ajax_delete() {
    let grup = $("#grup").val();
    
    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Data jadwal akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus !'
    }).then((result) => {
        if (result.value) {
          $.ajax({
              url: "<?= base_url('Dashboard/deleteJadwal') ; ?>",
              type: "POST",
              data: {
                grup: grup
              },
              success:function(){
                document.location.href = "<?= base_url('Dashboard/jadwal') ; ?>";
              }
          });
        }
    })
  }
</script>