<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Upload - ITS Expo 2017</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    #inti{
        padding-top: 50px;
        padding-bottom: 50px;
      }
    @media only screen and (max-device-width: 480px) {
      #inti{
        padding-top: 100px;
        padding-bottom: 50px;
      }
    }
  </style>

</head>
<body class="hold-transition skin-purple sidebar-mini" style="background-color: #ededed">
  <header class="main-header" style="position: fixed;margin:auto;width: 100%;top:0;">
    <a href="#" class="logo">
      <span class="logo-lg"><b>Halaman</b>Upload</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Nama Peserta</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src=" dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
  <div style="background-color: #ededed;" id="inti">

    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="timeline">
                <h4 style="text-align: center;"><strong>Unggah Berkas Pendukung</strong></h4>
               <br> 
                <form class="form-horizontal">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="file" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
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
              
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
  <footer class="main-footer pull-down" style="position:fixed;bottom: 0;width: 100%;margin:auto;">
    <strong>Copyright &copy; 2017 <a href="#">WebAPPS ITS Expo</a>.</strong> All rights
    reserved.
  </footer>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
