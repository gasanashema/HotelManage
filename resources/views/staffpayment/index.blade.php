@extends('layout')
@section('content')
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><span class="text-success">{{$staff->full_name}}</span> Payments
            <a href="{{ url('/admin/staff/payment/'.$staff_id.'/add') }}" class="float-right btn btn-success btn-sm">Add New Payment</a>
        </h6>
    </div>
    <div class="card-body">
    @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                       
                    </tr>
                </tfoot>
                <tbody>
                    @if($data)
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->amount}}</td>
                            <td>{{$d->payment_date}}</td>
                            <td>
                                <a href="{{url('admin/staff/'.$d->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{url('admin/staff/payment/'.$d->id.'/'.$staff_id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
    @section('script')
        <link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Page level plugins -->
        <script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>
    @endsection
@endsection