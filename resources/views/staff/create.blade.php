@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Staff 
        <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/staff')}}" enctype="multipart/form-data" method="POST" >
                @csrf
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        <td>Full Name </td>
                        <td>
                      <input type="text" name="fullname" id="" class="form-input" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>
                     <select name="department_id" id="" required>
                        <option value="">---select---</option>
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                     </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Photo </td>
                        <td>
                      <input type="file" name="photo" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Bio</td>
                        <td>
                      <textarea  name="bio" class="form-input" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Salary Type </td>
                        <td>
                      <input type="radio" name="salary_type" value="daily" >Daily
                      <input type="radio" name="salary_type" value="monthly" >Monthly
                        </td>
                    </tr>
                    <tr>
                        <td>Salary Amount</td>
                        <td>
                      <input type="number" name="salary_amt" class="form-input" required>
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