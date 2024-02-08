@extends('adminlte::page')

@section('title', 'Positions | Modify')

@section('content_header')
    <h1>Positions: Modify</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <form method="post" action="{{route('app.admin.positions.update', $position)}}">
                    @csrf
                    @method('put')
                <div class="card-header">
                    <h3 class="card-title">Modify Position</h3>
                    <div class="card-tools">
                        <a href="{{route('app.admin.positions.index')}}" class="btn btn-default btn-sm"><span class="fas fa-reply"></span> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">ID</label>
                        <input type="text" name="id" class="form-control" 
                            value="{{$position->id}}"
                            class="@error('id') is-invalid @enderror"
                            placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="#">Name</label>
                        <input type="text" name="name" class="form-control" 
                            value="{{$position->name}}"
                            class="@error('name') is-invalid @enderror"
                            placeholder="Enter position name">
                         @error('name')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <button type="reset" class="btn btn-default"> Clear</button>
                    <button type="submit" class="btn btn-primary float-right"> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    Copyright &copy; 2024. <strong>CBRJ Admin</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
@stop