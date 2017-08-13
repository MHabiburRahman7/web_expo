<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Data Peserta</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <!-- CSRF TOKEN -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
  </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a class="judul"><b>ITS</b>Expo</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Isi form dibawah untuk melengkapi data anda</p>

    <form action="{{url('/profile')}}" method="POST">
    {{csrf_field()}}
      @if($kompetisi->nama != 'Section')
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nama_tim" value="{{old('nama_tim')}}" placeholder="Nama Tim">
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        @if ($errors->has('nama_tim'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('nama_tim') }}</div>
        @endif
      </div>
      @endif
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="asal_instansi" value="{{old('asal_instansi')}}" placeholder="Asal Instansi">
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        @if ($errors->has('asal_instansi'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('asal_instansi') }}</div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="alamat_instansi" value="{{old('alamat_instansi')}}" placeholder="Alamat Instansi">
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        @if ($errors->has('alamat_instansi'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('alamat_instansi') }}</div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <select name="kategori" class="form-control">
          <option disabled="" selected>--pilih kategori--</option>
          @foreach($kategori as $kat)
            <option value="{{$kat->id}}" >{{$kat->nama}}</option>
          @endforeach
        </select>
        @if ($errors->has('kategori'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('kategori') }}</div>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
        </div>
      </div>
    </form>
    <br>

  </div>
</div>

<script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
</body>
</html>
