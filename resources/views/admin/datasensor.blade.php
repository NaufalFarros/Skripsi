@extends('admin.index')


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data ESP8266</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data-ESP</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6-lg">
                <canvas id="myChart" width="500" height="400"></canvas>

            </div>
            <div class="col-6-lg">
                <canvas id="myChart2" width="500" height="400"></canvas>
                
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->



@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}


<script src="{{asset('js/chartDinamic.js')}}"></script>












@endsection



@endsection