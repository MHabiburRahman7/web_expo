<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/style.css">


</head>
<body class="hold-transition skin-purple sidebar-mini">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-lg"><b>Admin</b>Area</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src=" dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Administrator
                  <small>Admin ITS Expo</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div style="background-color: #ededed;">

    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi</h3>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Administrator</h3>
              <center>
                <span class="label label-warning">Admin</span>
              </center>
              <br>
              <strong><i class="fa fa-calculator margin-r-5"></i> Jumlah Pendaftar</strong>
              <br>
              <br>
              <p>IEPC  <span class="label label-primary">10</span></p>
              <br>
              <p>Robot  <span class="label label-primary">14</span></p>
              <br>
              <p>Dance  <span class="label label-primary">20</span></p>
              
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#iepc" data-toggle="tab">Data Peserta</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="iepc">
                <section class="content">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Data Peserta IEPC</h3>
                        </div>
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Nama Peserta</th>
                              <th>Email</th>
                              <th>Kompetisi</th>
                              <th>Pengaktifan</th>
                              <th>Status Bayar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>Muhammad Khotib</td>
                              <td>mkhotib20@gmaail.com</td>
                              <td>Robot</td>
                              <td><a class="btn btn-primary" href="#">Aktifkan</a></td>
                              <td><span class="label label-danger">Belum Aktif</span></td>
                            </tr>
                            <tr>
                              <td>Mohamad David</td>
                              <td>davi20@gmail.com</td>
                              <td>IEPC</td>
                              <td><a class="btn btn-success" >Sudah Aktif</a></td>
                              <td><span class="label label-success">Aktif</span></td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
  <footer class="main-footer pull-right">
    <strong>Copyright &copy; 2017 <a href="#">WebAPPS ITS Expo</a>.</strong> All rights
    reserved.
  </footer>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</html>
