@extends('layouts.itsexpo')

@section('content')
<?php 
  $agt = $anggota[0]->maks;
  $kta = $ketua[0]->maks;
  $id_a = $anggota[0]->id;
  $id_k = $ketua[0]->id;
  $total = $kta + $agt;
  //dd($anggota,$ketua);
?>
  <div style="background-color: #ededed;" id="inti">

    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Peserta</h3>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::user()->nama}}</h3>
              <center>
                <span class="label label-success">Success</span> <!-- Kalo sudah aktif ganti class nya jadi label label-success -->
              </center>
              <br>
              <strong><i class="fa fa-book margin-r-5"></i> Asal Instansi</strong>

              <p class="text-muted">
                {{$profile->asal_instansi}}
              </p>
              <hr>
              <strong><i class="fa fa-trophy margin-r-5"></i> Kompetisi Yang Diikuti</strong>
              <p class="text-muted">ITS {{$kompetisi->nama}}</p>
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="{{url('/')}}" >Timeline Kompetisi</a></li>
              <li class="active"><a href="{{url('/anggota')}}" >Edit Anggota</a></li>
              <li><a href="{{url('/berkas')}}">Upload Berkas</a></li>
            </ul>
            @if(count($semua) > 0)
            <div class="tab-content">
              <div class="active tab-pane" id="timeline"> 
                <form class="form-horizontal" method="POST" action="{{url('/anggota/add')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <?php $i = 1; ?>
                  @foreach($semua as $tmp)
                  <h3>Anggota {{$i}}</h3>
                  Nama: <br>
                  <div class="form-group">
                    <input type="text" name="nama[]" value="{{$tmp->nama}}" required>
                  </div>
                  Telpon: <br>
                  <div class="form-group">
                    <input type="text" name="telp[]" value="{{$tmp->telp}}" required>
                  </div>
                  ID Line: <br>
                  <div class="form-group">
                    <input type="text" name="id_line[]" value="{{$tmp->id_line}}" required>
                  </div>
                  Alamat: <br>
                  <div class="form-group">
                    <input type="textarea" name="alamat[]" value="{{$tmp->alamat}}" required>
                  </div>
                  Jenis Kelamin: <br>
                  @if($tmp->jenis_kelamin == 'L')
                  <div class="form-group">
                    <select name="jk[]" required>
                      <option value="L" selected>Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  @else
                  <div class="form-group">
                    <select name="jk[]" required>
                      <option value="L">Laki-Laki</option>
                      <option value="P" selected>Perempuan</option>
                    </select>
                  </div>
                  @endif
                  Tanggal Lahir: <br>
                  <div class="form-group">
                    <input type="date" name="tgl_lahir[]" value="{{$tmp->tanggal_lahir}}" required>
                  </div>
                  Tempat Lahir: <br>
                  <div class="form-group">
                    <input type="text" name="tmpt_lahir[]" value="{{$tmp->tempat_lahir}}" required>
                  </div>
                  No Identitas: <br>
                  <div class="form-group">
                    <input type="text" name="nomor_identitas[]" value="{{$tmp->nomor_identitas}}" required>
                  </div>
                  Peranan: <br>
                  @if($tmp->role_id == $id_k)
                  <select name="role_id[]" required>
                    <option value="{{$id_k}}" selected>Ketua</option>
                    <option value="{{$id_a}}">Anggota</option>                    
                  </select>
                  @else
                  <select name="role_id[]" required>
                    <option value="{{$id_k}}">Ketua</option>
                    <option value="{{$id_a}}" selected>Anggota</option>                    
                  </select>
                  @endif
                  <br><br>Email: <br>
                  <div class="form-group">
                    <input type="email" name="email[]" value="{{$tmp->email}}" required>
                  </div>
                  <?php $i++;?>
                  @endforeach
                  <input type="submit">
                </form>
              </div>
              <br>
            </div>
            @else
            <div class="tab-content">
              <div class="active tab-pane" id="timeline"> 
                <form class="form-horizontal" method="POST" action="{{url('/anggota/edit')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  @for($i = 1; $i <= $total; $i++)
                  <h3>Anggota {{$i}}</h3>
                  Nama: <br>
                  <div class="form-group">
                    <input type="text" name="nama[]"  required>
                  </div>
                  Telpon: <br>
                  <div class="form-group">
                    <input type="text" name="telp[]" required>
                  </div>
                  ID Line: <br>
                  <div class="form-group">
                    <input type="text" name="id_line[]" required>
                  </div>
                  Alamat: <br>
                  <div class="form-group">
                    <input type="textarea" name="alamat[]" required>
                  </div>
                  Jenis Kelamin: <br>
                  <div class="form-group">
                    <select name="jk[]" required>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  Tanggal Lahir: <br>
                  <div class="form-group">
                    <input type="date" name="tgl_lahir[]" required>
                  </div>
                  Tempat Lahir: <br>
                  <div class="form-group">
                    <input type="text" name="tmpt_lahir[]" required>
                  </div>
                  No Identitas: <br>
                  <div class="form-group">
                    <input type="text" name="nomor_identitas[]" required>
                  </div>
                  Peranan: <br>
                  <select name="role_id[]" required>
                    <option value="{{$id_k}}">Ketua</option>
                    <option value="{{$id_a}}">Anggota</option>                    
                  </select>
                  <br><br>Email: <br>
                  <div class="form-group">
                    <input type="email" name="email[]" required>
                  </div>
                  @endfor
                  <input type="submit">
                </form>
              </div>
              <br>
            </div>
            @endif
          </div>
        </div>
      </div>

    </section>
  </div>
 @endsection

@section('script')
<script type="text/javascript">
var DataTableBasic = function() {
    
    var handle_DataTable = function() {
        
        $('.table-dataTable').DataTable({
            
            "oLanguage": {
                "sLengthMenu": "_MENU_ Rows",
                "sSearch": ""                
            },
            "aLengthMenu": [
                [5, 10, 15, 20, 50, -1],
                [5, 10, 15, 20, 50, "All"] // change per page values here
            ],
            
            "iDisplayLength": 10    // set the initial value
        });
       
        $('.dataTables_filter input').attr("placeholder", "Search...");
        
    };  //  Function to handle Data TAble
    
       
    return {        
        init: function() {
            handle_DataTable();
        }
         
    };
}();
jQuery(document).ready(function () {
            DataTableBasic.init();
        });
</script>
@endsection