<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Detail Akun</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <!-- CSRF TOKEN -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
  </script>

</head>
<body class="hold-transition skin-purple sidebar-mini">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-lg"><b>Dashboard</b>Peserta</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" {{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">Nama Peserta</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src=" dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  Muhammad Khotib
                  <small>ITS Expo Paper Competition</small>
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
              <h3 class="box-title">Informasi Peserta</h3>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" {{url('dist/img/user2-160x160.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">Muhammad Khotib</h3>
              <center>
                <span class="label label-danger">Belum Aktif</span> <!-- Kalo sudah aktif ganti class nya jadi label label-success -->
              </center>
              <br>
              <strong><i class="fa fa-book margin-r-5"></i> Asal Instansi</strong>

              <p class="text-muted">
                Departemen Sistem Informasi - ITS
              </p>
              <hr>
              <strong><i class="fa fa-trophy margin-r-5"></i> Kompetisi Yang Diikuti</strong>
              <p class="text-muted">ITS Paper Competition</p>
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">Timeline Kompetisi</a></li>
              <li><a href="#settings" data-toggle="tab">Perbarui Informasi Peserta</a></li>
              <li><a href="#bayar" data-toggle="tab">Pembayaran</a></li>
              <li><a href="#upload" data-toggle="tab">Upload Berkas</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="timeline">
                <ul class="timeline timeline-inverse">
                  <li class="time-label">
                        <span class="bg-purple">
                          10 Juli. 2017
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Panitia ITS Expo</a> anda akan dikirmkan email pemberitahuan</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                    </div>
                  </li>
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Lengkap</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Nama Lengkap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Pengguna</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Nama Pengguna">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kata Sandi</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="Kata Sandi">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kata Sandi</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" placeholder="Ketik Ulang Kata Sandi">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Ubah</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="bayar">
                <!--Bingung :'D isiin yak-->
              </div>
              <br>
              <div class="tab-pane" id="upload">
              <h4>Unggah Berkas Pendukung</h4>
               <br> 
                <form class="form-horizontal">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="file" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
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

<script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('plugins/fastclick/fastclick.js')}}"></script>
<script src="{{url('dist/js/app.min.js')}}"></script>
<script src="{{url('dist/js/demo.js')}}"></script>
</body>
</html>
