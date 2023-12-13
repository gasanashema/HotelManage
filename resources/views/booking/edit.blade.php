@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Customer
        <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/customer/'.$data->id)}}" enctype="multipart/form-data" method="POST" >
                @csrf
                @method('put')
                <table class="table table-bordered">
        
              
        <tbody>
            <tr>
                
                <td>Full Names <span class="text-danger">*</span></td>
                <td>
              <input type="text" value="{{$data->full_name}}" name="names" id="" class="form-input" required>
                </td>
                
            </tr>
            <tr>
                
                <td>Email <span class="text-danger">*</span></td>
                <td>
             <input type="email" value="{{$data->email}}" name="email" required id="">
                </td>
                
            </tr>
      
            <tr>
                
                <td>Mobile <span class="text-danger">*</span></td>
                <td>
             <input type="text" value="{{$data->mobile}}" name="mobile" required id="">
                </td>
                
            </tr>
            <tr>
                
                <td>Address </td>
                <td>
             <input type="text" value="{{$data->address}}" name="address" id="">
                </td>
                
            </tr>
            <tr>
                
                <td>Photo </td>
                <td>
             <input type="file" name="photo" id="">
             <input type="hidden" name="prev_photo" value="{{$data->photo}}">
             <img src="{{asset('storage/app/'.$data->photo)}}" width="100" alt="">
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