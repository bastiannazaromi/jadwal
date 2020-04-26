<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">

        <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
        <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>


        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title ; ?></h6>
        </div>

        <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>

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
                        <th>Shift</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data as $dt) : ?>
                        <tr>
                            <th><?= $i++ ?></th>
                            <td><?= $dt['shift']; ?></td>
                            <td><?= $dt['tanggal_mulai'] ; ?> </td>
                            <td><?= $dt['tanggal_akhir']; ?></td>
                            <td>
                                <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $dt['id_shift']; ?>"><i class="fa fa-edit"></i> Edit</a>
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

<!-- Modal Edit-->
<?php foreach ($data as $dt) : ?>
    <div class="modal fade" id="modalEdit<?= $dt['id_shift']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('Dashboard/editShift'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $dt['id_shift']; ?>" name="id">
                        <div class="form-group">
                            <label for="nama">Nama Shift</label>
                            <input type="shift" class="form-control" id="shift" name="shift" required autocomplete="off" value="<?= $dt['shift']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required autocomplete="off" value="<?= $dt['tanggal_mulai']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required autocomplete="off" value="<?= $dt['tanggal_akhir']; ?>">
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