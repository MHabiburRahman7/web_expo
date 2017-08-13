<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Pendaftaran Peserta</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
  </script>
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
    <p class="login-box-msg">Isi form dibawah untuk mendaftar</p>

    <form action="{{url('/register')}}" method="POST">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nama" value="{{old('nama')}}" placeholder="Nama Lengkap">
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        @if ($errors->has('nama'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('nama') }}</div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('email') }}</div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="telp" value="{{old('telp')}}"  onkeypress="return hanyaAngka(event)" placeholder="Telepon">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('telp'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('telp') }}</div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('password') }}</div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Ulang Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="kompetisi" class="form-control">
          <option disabled="" selected>--pilih kompetisi--</option>
          @foreach($kompetisi as $komp)
            <option value="{{$komp->id}}" >{{$komp->nama}}</option>
          @endforeach
        </select>
        @if ($errors->has('kompetisi'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('kompetisi') }}</div>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="setuju"> Dengan ini, saya setuju syarat dan ketentuan ITS Expo
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
      </div>
    </form>
    <br>

    <a href="{{url('/login')}}" class="text-center">Sudah mendaftar? Masuk disini</a>

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
