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
              <li class="active"><a href="{{url('/')}}" >Timeline Kompetisi</a></li>
              <li><a href="{{url('/anggota')}}" >Edit Anggota</a></li>
              <li><a href="{{url('/berkas')}}" >Upload Berkas</a></li>
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
              <br>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
 @endsection
