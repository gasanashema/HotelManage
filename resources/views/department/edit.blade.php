@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Department
        <a href="{{url('admin/department')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/department/'.$data->id)}}" method="POST" >
                @csrf
                @method('put')
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        
                        <td>Title </td>
                        <td>
                      <input type="text" value="{{$data->title}}" name="title" id="" class="form-input">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Details </td>
                        <td>
                     <textarea name="details" class="form-control">{{$data->details}}</textarea>
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