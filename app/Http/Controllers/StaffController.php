<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::all();
        $data=Staff::all();
        return view('staff.index',compact('data','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view('staff.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'department_id'=>'required',
            'photo'=>'required',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amt'=>'required',
        ]);
        

        $data = new Staff;

        $imgPath=$request->file('photo')->store('public/imgs/staff');

        $data->full_name=$request->fullname;
        $data->department_id=$request->department_id;
        $data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;
      
        $data->save();

        return redirect('admin/staff/create')->with('success','Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Staff::find($id);
        return view('staff.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments=Department::all();
        $data=Staff::find($id);
        return view('staff.edit',['data'=>$data,'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Staff::find($id);
        $request->validate([
            'fullname'=>'required',
            'department_id'=>'required',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amt'=>'required',
        ]);
        if ($request->hasFile('photo')) {
            $imgPath=$request->file('photo')->store('public/imgs/staff');
        }else{
            $imgPath=$request->prev_photo;
        }

        $data->full_name=$request->fullname;
        $data->department_id=$request->department_id;
        $data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;
      
        $data->save();


        return redirect('admin/staff/'.$id.'/edit')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::where('id',$id)->delete();
        return redirect('admin/staff/')->with('success','Data has been Deleted');

    }

    // all payments
    function all_payments(Request $request,$staff_id){
        $data=StaffPayment::where('staff_id',$staff_id)->get();
        $staff=Staff::find($staff_id);
        return view('staffpayment.index',compact('staff_id','data','staff'));

    }

    // Add Payment
    function add_payment($staff_id){
        $data=Staff::find($staff_id);
        return view('staffpayment.create',['staff_id'=>$staff_id,'data'=>$data]);

    }
    // save payment
    public function save_payment(Request $request,$staff_id)
    {
       $data=new StaffPayment;

        $data->staff_id=$staff_id;
        $data->amount=$request->amount;
        $data->payment_date=$request->amount_date;

        $data->save();


        return redirect('admin/staff/payment/'.$staff_id.'/add')->with('success','Data has been added');
    }
    public function delete_payment($id,$staff_id)
    {
        StaffPayment::where('id',$id)->delete();
        return redirect('admin/staff/payments/'.$staff_id)->with('success','Data has been Deleted');

    }


}
