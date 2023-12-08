@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Room Type
        <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/roomtype')}}" method="POST" enctype="multipart/form-data" >
                @csrf
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        
                        <td>Title </td>
                        <td>
                      <input type="text" name="title" id="" class="form-input">
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>Price </td>
                        <td>
                      <input type="number" name="price" id="" class="form-input">
                        </td>
                        
                    </tr>

                    <tr>
                        
                        <td>Details </td>
                        <td>
                      <textarea name="detail" id="" cols="20" rows="1"></textarea>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        
                        <td>Gallery </td>
                        <td>
                  <input type="file" multiple name="imgs[]" />
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