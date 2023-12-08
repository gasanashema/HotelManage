@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Room
        <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
        
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        <td>Title </td>
                        <td>{{$data->title}}</td>
                    </tr>
                    <tr>
                        <td>Room Type </td>
                        <td>{{$data->roomtype->title}}</td>
                    </tr>

                </tbody>
            </table>
       
        </div>
    </div>
</div>

</div>

@endsection