@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Staff
        <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/staff/'.$data->id)}}" method="POST" >
                @csrf
                @method('put')
                <table class="table table-bordered">
        
                        
                    <tbody>
                        <tr>
                            <td>Full Name </td>
                            <td>
                        <input type="text" name="fullname" value="{{$data->full_name}}" class="form-input" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>
                        <select name="department_id" id="" required>
                            <option value="">---select---</option>
                            @foreach($departments as $department)
                                <option @if($department->id == $data->department_id) selected @endif value="{{$department->id}}">{{$department->title}}</option>
                            @endforeach
                        </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Photo </td>
                            <td>
                            <img src="{{asset('/storage/app/'.$data->photo)}}" alt="{{$data->full_name}}" />

                            <input type="hidden" name="prev_photo" value="{{$data->photo}}">
                            <input type="file" name="photo">
                            </td>
                        </tr>
                        <tr>
                            <td>Bio</td>
                            <td>
                        <textarea  name="bio" class="form-input" required>{{$data->bio}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Salary Type </td>
                            <td>
                        <input type="radio" @if($data->salary_type == 'daily') checked @endif name="salary_type" value="daily" >Daily
                        <input type="radio" @if($data->salary_type=='monthly') checked @endif name="salary_type" value="monthly" >Monthly
                            </td>
                        </tr>
                        <tr>
                            <td>Salary Amount</td>
                            <td>
                        <input type="number" name="salary_amt" value="{{$data->salary_amt}}" class="form-input" required>
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