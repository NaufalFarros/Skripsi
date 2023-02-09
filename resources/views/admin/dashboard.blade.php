@extends('admin.index')

@section('content')
    <section class="content">
        <div class="container-fluid">
            {{-- <h5 class="mb-2 mt-4">Small Box</h5> --}}
            <div class="row">
                <div class="col-lg-3 col-6 mt-3">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                          {{-- @foreach ($data as $d ) --}}
                          
                          
                          <h3>{{$data == null ? 0 : $data->suhu}} 'C</h3>
                          {{-- @endforeach --}}
                          <p> tanggal:  <br>{{$data == null ? '-' : $data->tanggal}}</p>

                            <p>Sensor Suhu</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-temperature-low"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                          
                          
                            <h3>{{$data == null ? 0 : $data->ph}}</h3>
                            <p> tanggal:  <br>{{$data == null ? '-' : $data->tanggal}}</p>

                            <p>Sensor pH</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-soap"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <!-- small card -->
                    <div class="small-box bg-green">
                        <div class="inner">
                         
                         


                            <h3>{{$data == null ? 0 : $data->salinitas }}  ppt </h3>
                            <p> tanggal:  <br>{{$data == null ? '-' : $data->tanggal}}</p>
                            <p>Sensor Salinitas</p>
                          
                        </div>
                        <div class="icon">
                          <i class="fas fa-water"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
    </section>
@section('script')
@endsection

@endsection
