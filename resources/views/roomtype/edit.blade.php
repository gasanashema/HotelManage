@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit {{$data->title}}
        <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form enctype="multipart/form-data" action="{{url('admin/roomtype/'.$data->id)}}" method="POST" >
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
                        
                        <td>Price </td>
                        <td>
                      <input type="number" value="{{$data->price}}" name="price" id="" class="form-input">
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>Details </td>
                        <td>
                      <textarea name="detail" id="" cols="20" rows="1">{{$data->detail  }}</textarea>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Gallery</td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <input type="file" multiple name="imgs[]" id="">
                                    @foreach($data->roomtypeimage as $img)
                                    <td class="imgcol{{$img->id}}">
                                        <img src="{{asset('/storage/app/'.$img->img_src)}}" alt="image">
                                        <p class="mt-2">
                                            <button type="button" class="btn btn-sm btn-danger delete-image" data-image-id="{{$img->id}}" onclick="return confirm('Are you sure you want to delete this image?')"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </td>
                                    @endforeach

                                </tr>

                            </table>
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

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-image').on('click',function(){
            var _img_id=$(this).attr('data-image-id');
            var _vm=$(this);
            $.ajax({
                url:"{{url('admin/roomtypeimage/delete')}}/"+_img_id,
                dataType:'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success:function(res){
                   if (res.bool==true) {
                       $(".imgcol"+_img_id).remove();
                    }
                    _vm.removeClass('disabled');

                }
            });
        });
    });
</script>
@endsection

@endsection