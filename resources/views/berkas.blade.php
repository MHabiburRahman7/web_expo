@extends('layouts.itsexpo')

@section('content')
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
              <li><a href="{{url('/anggota')}}" >Edit Anggota</a></li>
              <li class="active"><a href="{{url('/berkas')}}">Upload Berkas</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="timeline">
                <form class="form-horizontal" method="POST" action="{{url('/berkas')}}" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tipe Berkas</label>

                    <div class="col-sm-10">
                      <select name="type" id="inputEmail" class="form-control">
                        <option disabled="" selected>--pilih Tipe--</option>
                        @foreach($tipe as $typ)
                        @if($typ->hidden != 1)
                        <option value="{{$typ->id}}" >{{$typ->nama}}</option>
                        @endif
                        @endforeach
                      </select>
                      @if ($errors->has('kompetisi'))
                      <div class="alert alert-danger">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> {{ $errors->first('kompetisi') }}</div>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Berkas</label>

                    <div class="col-sm-10">
                      <input type="file" name="berkas" class="form-control" id="inputEmail" placeholder="Upload Berkas">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Upload</button>
                    </div>
                  </div>
                </form>
               <table id="berkas" class="table table-bordered table-dataTable">
                 <thead>
                   <tr>
                     <th>User/Tim</th>
                     <th>Kompetisi</th>
                     <th>Tipe berkas</th>
                     <th>Nama berkas</th>
                     <th>Waktu upload</th>
                   </tr>
                 </thead>
                 <tfoot>
                   <tr>
                     <th>User/Tim</th>
                     <th>Kompetisi</th>
                     <th>Tipe berkas</th>
                     <th>Nama berkas</th>
                     <th>Waktu upload</th>
                   </tr>
                 </tfoot>>
                 <tbody>
                 @foreach($berkas as $bks)
                   <tr>
                   @if($bks->user()->first()->profile()->first()->nama_tim != '')
                     <td>{{$bks->user()->first()->profile()->first()->nama_tim}}</td>
                   @else
                     <td>{{$bks->user()->first()->anggota()->first()->nama}}</td>
                   @endif
                     <td>{{$bks->berkasType()->first()->nama}}</td>
                     <td>{{$bks->nama}}</td>
                     <td>{{$bks->created_at}]</td>
                   </tr>
                  @endforeach
                 </tbody>
               </table>

              </div>
              <br>
            </div>
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