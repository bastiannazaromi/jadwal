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
          <button type="button" class="btn btn-sm btn-neutral float-right" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Karyawan</button>
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
                        <th>Alamat</th>
                        <th>Aksi</th>
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
                            <td><?= $dt['alamat']; ?></td>
                            <td>
                                <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $dt['id_karyawan']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?= base_url() ?>Dashboard/deleteKaryawan/<?= $dt['id_karyawan']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
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
        <form action="<?= base_url('Dashboard/addKaryawan'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="grup">Nama Grup</label>
                        <select class="custom-select" id="inputGroupSelect02" name="grup">
                          <option value="1">-- Pilih Grup --</option>
                          <option value="1">A</option>
                          <option value="2">B</option>
                          <option value="3">C</option>
                          <option value="4">D</option>
                          <option value="5">E</option>
                          <option value="6">F</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shift">POS</label>
                        <select class="custom-select" id="pos" name="pos">
                          <option value="1">-- Pilih POS --</option>
                          <?php foreach ($tempat as $dt) : ?>
                            <option data-tempat="<?= $dt['tempat'] ; ?>" value="<?= $dt['id'] ; ?>"><?= $dt['pos'] ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" readonly class="form-control" id="tempat" name="tempat" required autocomplete="off">
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
<?php foreach ($data as $dt) : ?>
    <div class="modal fade" id="modalEdit<?= $dt['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('Dashboard/editKaryawan'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $dt['id_karyawan']; ?>" name="id">
                        <div class="form-group">
                            <label for="nama">Nama karyawan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $dt['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" value="<?= $dt['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="grup">Nama Grup</label>
                            <select class="custom-select" id="inputGroupSelect02" name="grup">
                              <option value="1"<?php if ($dt['grup'] == 1) echo 'selected="selected"' ;?>>A</option>
                              <option value="2"<?php if ($dt['grup'] == 2) echo 'selected="selected"' ;?>>B</option>
                              <option value="3"<?php if ($dt['grup'] == 3) echo 'selected="selected"' ;?>>C</option>
                              <option value="4"<?php if ($dt['grup'] == 4) echo 'selected="selected"' ;?>>D</option>
                              <option value="5"<?php if ($dt['grup'] == 5) echo 'selected="selected"' ;?>>E</option>
                              <option value="6"<?php if ($dt['grup'] == 6) echo 'selected="selected"' ;?>>F</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="shift">POS</label>
                        <select class="custom-select" id="pos2" name="pos2">
                          <option value="1">-- Pilih POS --</option>
                          <?php foreach ($tempat as $dt) : ?>
                            <option data-tempat2="<?= $dt['tempat'] ; ?>" value="<?= $dt['id'] ; ?>"><?= $dt['pos'] ; ?></option>
                          <?php endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" readonly class="form-control" id="tempat2" name="tempat2" required autocomplete="off">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<script>
    $(function() {
      $('#pos').change(function() {
        let tempat = $(this).find(':selected').data('tempat');
        $('#tempat').val(tempat);
      });
      $('#pos2').change(function() {
        let tempat2 = $(this).find(':selected').data('tempat2');
        $('#tempat2').val(tempat2);
      });
    });
</script>