@extends('admin.index')

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
@endsection

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

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Suhu</th>
                                <th>Kalman Suhu</th>
                                <th>Salinitas</th>
                                <th>Kalman Salinitas</th>
                                <th>pH</th>
                                <th>Kalman pH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sensorData as $d)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ 
                                        $d->tanggal->isoFormat('dddd, D  MMM Y ') 
                                    
                                    }}</td>

                                    <td>{{ $d->suhu }}</td>
                                    <td>{{ $d->kalmanSuhu }}</td>
                                    <td>{{ $d->salinitas }}</td>
                                    <td>{{ $d->kalmanSalinitas }}</td>
                                    <td>{{ $d->ph }}</td>
                                    <td>{{ $d->kalmanPh }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Suhu</th>
                                <th>Kalman Suhu</th>
                                <th>Salinitas</th>
                                <th>Kalman Salinitas</th>
                                <th>pH</th>
                                <th>Kalman pH</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>



@section('script')
    <script>
    //format tanggal indonesia jquery
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
            hours = d.getHours();
            minutes = d.getMinutes();
            seconds = d.getSeconds();


        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day, month, year, hours, minutes, seconds].join('-');
    }
    </script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>




    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
@endsection

