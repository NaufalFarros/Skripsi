@extends('admin.index')

@section('content')

<div class="container-fluid">
    <div class="info-box bg-info">
        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Data Sensor</span>
          <span class="info-box-number"></span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Increase in 30 Days
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
</div>




@endsection