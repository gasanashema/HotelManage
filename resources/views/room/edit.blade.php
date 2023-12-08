@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Room Type
        <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/rooms/'.$data->id)}}" method="POST" >
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
                        <td>Room Type </td>
                        <td>
                     <select name="roomtype" id="" required>
                        <option value="">---select---</option>
                        @foreach($roomtype as $rt)
                            <option @if($data->room_type_id==$rt->id) selected @endif value="{{$rt->id}}">{{$rt->title}}</option>
                        @endforeach
                     </select>
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