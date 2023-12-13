@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Booking
        <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <form action="{{url('admin/booking')}}" method="POST" >
                @csrf
            <table class="table table-bordered">
        
              
                <tbody>
                    <tr>
                        
                        <td>Select Customer<span class="text-danger">*</span></td>
                        <td>
                      <select name="customer_id" class="form-control" required>
                        <option value="" selected disabled>--select customer--</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                        @endforeach
                      </select>
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>CheckIn Date <span class="text-danger">*</span></td>
                        <td>
                     <input type="date" name="checkin_date" class="form-control checkin-date" required>
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>CheckOut Date <span class="text-danger">*</span></td>
                        <td>
                     <input type="date" name="checkout_date" class="form-control" required>
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>Available Rooms <span class="text-danger">*</span></td>
                        <td>
                            <select name="room_id" class="form-control room-list" required>
                               
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>Total Adults <span class="text-danger">*</span></td>
                        <td>
                            <input type="number" name="total_adults" class="form-control" required>
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>Total Children <span class="text-danger">*</span></td>
                        <td>
                            <input type="number" name="total_children" class="form-control" required>
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
<script>
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
           
            // Ajax

            $.ajax({
                url:"{{url('admin/booking/available-rooms')}}/"+_checkindate,
                type:"get",
                dataType:"json",
                beforeSend:function(){
                    $(".room-list").html("<option>---Loading---</option>");
                },
                success:function(res){
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option value="'+row.id+'">'+row.title+'</option>';
                    });
                    $(".room-list").html(_html);
                }

            });
        });
    });
</script>

@endsection

@endsection