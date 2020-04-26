<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Font Awesome icons (free version)-->
        <script src="<?= base_url(); ?>assets/frontend/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="<?= base_url(); ?>assets/frontend/css/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url() ; ?>assets/frontend/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" type="text/css">
        <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" type="text/css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">PT. Global Arrow</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#jadwal">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Your Favorite Source of Free Bootstrap Themes</h1>
                        <hr class="divider my-4" />
                    </div>
                </div>
            </div>
        </header>
        <!-- Services section-->
        <section class="page-section" id="jadwal">
            <div class="container">
                <h2 class="text-center mt-0">Jadwal Karyawan</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-transparent">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-bordered align-items-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table table-warning">
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
                                        foreach ($jadwal as $dt) : ?>
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
        </section>
        <!-- Contact section-->
        <section class="page-section bg-light" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i
                        ><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © PT. Global Arrow <?= date('Y') ; ?></div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="<?= base_url() ; ?>assets/frontend/js/jquery.min.js"></script>
        <script src="<?= base_url() ; ?>assets/frontend/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="<?= base_url() ; ?>assets/frontend/js/jquery.easing.min.js"></script>
        <script src="<?= base_url() ; ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url() ; ?>assets/frontend/js/scripts.js"></script>
        
        <script src="<?php echo base_url() ;?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    "lengthMenu": [[6, 12, 18, 24, 30, 36, -1], [6, 12, 18, 24, 30, 36, "All"]]
                });
            } );
        </script>
    </body>
</html>