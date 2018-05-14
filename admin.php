<?php
include("controllers/AdminController.php");
include("models/DonasiModel.php");
include("etc/Koneksi.php");
session_start();
if (isset($_SESSION['email'])) {
  if ($_SESSION['email'] == 'admin@admin.com') {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="donasikanlogo.png" rel="icon">
      <link href="donasikanlogo.png" rel="donasikanlogo">
      <title>Admin Dashboard | Donasikan</title>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">Donasikan</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="admin.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Donasi">
              <a class="nav-link" href="admin_donasi.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Donasi</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="user">
              <a class="nav-link" href="admin_user.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">User</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="user">
              <a class="nav-link" href="admin_donasi_terkumpul.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Donasi Terkumpul</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="user">
              <a class="nav-link" href="admin_donasi_lengkap.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Donasi Memenuhi Target</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="user">
              <a class="nav-link" href="controllers/LogOutController.php">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Log Out</span>
              </a>
            </li>
          </ul>

          <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
              <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Dashboard Admin</li>
          </ol>
          <!-- Icon Cards-->



          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Daftar Donasi yang perlu dicek </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Email</th>
                        <th>Foto Donasi</th>
                        <th>Kontak</th>
                        <th>Di Buat</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $admin = new AdminController();
                      $rows = $admin->tampilListDonasi();
                      foreach ($rows as $row) {
                        echo "<tr>
                        <td>$row[nama]</td>
                        <td>$row[judul]</td>
                        <td>$row[email]</td>
                        <td><a href='bukti/$row[foto]' target='_blank' class='btn btn-primary btn-sm'>TAMPIL BUKTI</a></td>
                        <td>$row[no_hp]</td>
                        <td>$row[tgl_donasi]</td>
                        <td><a href='controllers/AdminController.php?terima=1&id=$row[id_donasi]' role='button' aria-disabled='false' class='btn btn-success btn-sm'>Terima</a>
                        <a href='controllers/AdminController.php?delete=1&id=$row[id_donasi]' role='button' aria-disabled='false' class='btn btn-danger btn-sm'>Tolak</a></td>
                        </tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
          </div>
          <!-- /.container-fluid-->
          <!-- /.content-wrapper-->
          <footer class="sticky-footer">
            <div class="container">
              <div class="text-center">
                <small>Copyright © Kelompok 5</small>
              </div>
            </div>
          </footer>
          <!-- Scroll to Top Button-->
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
          </a>
          <!-- Logout Modal-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Bootstrap core JavaScript-->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- Core plugin JavaScript-->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
          <!-- Page level plugin JavaScript-->
          <script src="vendor/chart.js/Chart.min.js"></script>
          <script src="vendor/datatables/jquery.dataTables.js"></script>
          <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
          <!-- Custom scripts for all pages-->
          <script src="js/sb-admin.min.js"></script>
          <!-- Custom scripts for this page-->
          <script src="js/sb-admin-datatables.min.js"></script>
          <script src="js/sb-admin-charts.min.js"></script>
        </div>
      </body>

      </html>
      <?php
    }else{
      header("Location: index setelah log in.php");
    }
  } ?>
