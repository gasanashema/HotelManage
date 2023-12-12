@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Staff Payment
        <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/staff/payment/'.$staff_id)}}" method="POST" >
                @csrf
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        <td>Staff Name</td>
                        <td>
                      <input type="text" name="staff_name" disabled value="{{$data->full_name}}" id="" class="form-input" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>
                      <input type="text" name="department" disabled value="{{$data->department->title}}" id="" class="form-input" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>
                      <input type="number" name="amount" id="" class="form-input" required>
                        </td>
                    </tr>
                
                    <tr>
                        <td>Amount Date</td>
                        <td>
                      <input type="date" name="amount_date" class="form-input" required>
                        </td>
                    </tr>
                    <tr>
                        
                        <td> </td>
                        <td>
                      <input type="submit" value="Save" class="btn btn-primary">
                        </td>
                        
                    </tr>

                </tbody>
            </table>
            </form>
        </div>
    </div>
</div>

</div>

@endsection