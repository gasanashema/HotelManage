@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Staff
        <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
        
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        <td>Full Names</td>
                        <td>{{$data->full_name}}</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>{{$data->department->title}}</td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>
                        <img src="{{asset('/storage/app/'.$data->photo)}}" alt="{{$data->full_name}}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Bio</td>
                        <td>{{$data->bio}}</td>
                    </tr>
                    <tr>
                        <td>Salary Type</td>
                        <td>{{$data->salary_type}}</td>
                    </tr>
                    <tr>
                        <td>Salary Amount</td>
                        <td>$ {{$data->salary_amt}}</td>
                    </tr>
                    
                </tbody>
            </table>
       
        </div>
    </div>
</div>

</div>

@endsection