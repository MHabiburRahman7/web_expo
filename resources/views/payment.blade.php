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
  <h3 class="login-box-msg">Konfirmasi Pembayaran</h3>
  <p class="login-box-msg">Silahkan Melakukan Pembayaran Sebesar</p>
  <h3 class="login-box-msg"><strong>{{'Rp. ' . number_format($kategori->harga+Auth::user()->id, 0 , '' , '.' ) . ',-'}}</strong></h3>
  <h4>Prosedur Pembayaran :</h4>
            <ol>
              <li>Transfer uang sesuai nominal yang ditentukan ke NOREK MANDIRI 141-00-1342683-8 a.n BEM ITS.ITS EXPO.</li>             
              <li>Upload bukti transfer pada form upload di bawah.</li>
              <li>Lakukan konfirmasi pembayaran dengan mengirim SMS ke Contact Person yang tertera.</li>
              <li>Tunggu konfirmasi dari Contact Person tentang Aktivasi Akun anda.</li>
              <li>Setelah mendapatkan konfirmasi, login di halaman kompetisi yang akan anda ikuti dengan username dan password anda.</li>
            </ol>
    <p>Contact Person:<br>
        {!!$kompetisi->contact!!}</p>
    <form action="{{url('/payment')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="file" class="form-control" name="bukti" placeholder="Bukti Pembayaran">
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        @if ($errors->has('bukti'))
        <div class="alert alert-danger">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('bukti') }}</div>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Konfirmasi</button>
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
