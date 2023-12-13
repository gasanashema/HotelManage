@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Customer
        <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
        
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        <td>FullNames </td>
                        <td>{{$data->full_name}}</td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <td>Mobile </td>
                        <td>{{$data->mobile}}</td>
                    </tr>
                    <tr>
                        <td>Address </td>
                        <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                        <td>Photo </td>
                        <td><img src="{{asset('storage/app/'.$data->photo)}}" width="150" alt=""> </td>
                    </tr>

                </tbody>
            </table>
       
        </div>
    </div>
</div>

</div>

@endsection