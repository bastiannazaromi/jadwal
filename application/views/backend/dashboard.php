<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title ; ?></h6>
        </div>
      </div>

      <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
      <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>

      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Karyawan</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($karyawan) ;?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <a href="<?= base_url('Dashboard/karyawan') ;?>" ><span class="text-nowrap">Detail Karyawan</span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Shift</h5>
                  <span class="h2 font-weight-bold mb-0"><?= count($shift) ; ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <a href="<?= base_url('Dashboard/shift') ;?>" ><span class="text-nowrap">Detail Shift</span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Jam</h5>
                  <span class="h2 font-weight-bold mb-0" id="jam"></span>
                  <span class="h2 font-weight-bold mb-0">:</span>
                  <span class="h2 font-weight-bold mb-0" id="menit"></span>
                  <span class="h2 font-weight-bold mb-0">:</span>
                  <span class="h2 font-weight-bold mb-0" id="detik"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="far fa-clock"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <span class="text-nowrap"></span>
              </p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    window.setTimeout("waktu()",1000);
    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()",1000);
        $('#jam').text(tanggal.getHours());
        $('#menit').text(tanggal.getMinutes());
        $('#detik').text(tanggal.getSeconds());
    }
</script>