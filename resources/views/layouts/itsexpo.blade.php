<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard - ITS Expo 2017</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.css">


  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  @yield('style')
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
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
  </form>
  
</head>
<body class="hold-transition skin-purple sidebar-mini" style="background-color: #ededed">
  <header class="main-header" style="position: fixed;margin:auto;width: 100%;top:0;">
    <a href="#" class="logo">
      <span class="logo-lg"><b>Dashboard</b>Peserta</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src=" dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->nama}}
                  <small>ITS Expo {{$kompetisi->nama}}</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  @yield('content')
   <footer class="main-footer pull-down" style="position:fixed;bottom: 0;width: 100%;margin:auto;">
    <strong>Copyright &copy; 2017 <a href="#">WebAPPS ITS Expo</a>.</strong> All rights
    reserved.
  </footer>


<script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('plugins/fastclick/fastclick.js')}}"></script>
<script src="{{url('dist/js/app.min.js')}}"></script>
<script src="{{url('dist/js/demo.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
@yield('script')
</body>
</html>