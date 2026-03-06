<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Reservation;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cus=Customer::all();    
        return view('customers.index',['cus'=>$cus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
        "name"=>['required',"string"],
        "phone"=>['required',"string"],
        "address"=>['required',"string"],
        "email"=>['required',"email"],
    ]);

        $customer=new Customer();
        $customer->Phone=$request->input('phone');
        $customer->Name=$request->input('name');
        $customer->Email=$request->input('email');
        $customer->Address=$request->input('address');
        $customer->save();
        return redirect()->route("customers.create")->with('Verify','Customer Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Customer::find($id);
        return view('customers.show',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Customer::find($id);
        return view('customers.edit',['edit'=>$edit]);
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
        $request->validate([
            "name"=>['required',"string"],
            "phone"=>['required',"string"],
            "address"=>['required',"string"],
            "email"=>['required',"email"],
        ]);
    
            $customer=Customer::find($id);
            $customer->Phone=$request->input('phone');
            $customer->Name=$request->input('name');
            $customer->Email=$request->input('email');
            $customer->Address=$request->input('address');
            $customer->save();
            return redirect()->route("customers.update",$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Customer::find($id);
        $delete->delete();
        return redirect()->route("customers.index",$id);
    }
    public function reserved(){
        $res=Reservation::with('customer')->where('Status','Accepted')->where('Check_Out',date("Y-m-d"))->get(); 
        return view('customers.reserved',['res'=>$res]);  
     }
    public function save_customer(Request $request){
        $validator=Validator::make($request->all(),['Name'=>'required','Email'=>'required','Phone'=>'required','Address'=>'required']);
        if($validator->passes())
        {
            $obj = new Customer();
            $obj->Phone = $request->input('Phone');
            $obj->Name = $request->input('Name');
            $obj->Email = $request->input('Email');
            $obj->Address = $request->input('Address');
            $obj->save();
            $arr = array('status'=>'true','message'=>'Contect Query Successfully Send');
            }
        else 
        {
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
    public function check_email(Request $request){
        $email=Customer::select('Email')->where('Email',$request->input('Email'))->get()->toArray();
        if($email){
            $arr = array('status'=>'true','message'=>'Success','data'=>$email);
        }
        else{
            $arr = array('status'=>'false','message'=>'Email Not Found');
        }
        echo json_encode($arr);
    }
    public function check_email_signup(Request $request){
        $email=Customer::select('Email')->where('Email',$request->input('Email'))->get()->toArray();
        if($email){
            $arr = array('status'=>'false','message'=>'Email Exists');
        }
        else{
            $arr = array('status'=>'true','message'=>'Success');
        }
        echo json_encode($arr);
    }
    public function check_name(Request $request){
        $name=Customer::select('Name')->where('Name',$request->input('Name'))->get()->toArray();
        if($name){
            $arr = array('status'=>'false','message'=>'Name Exists');
        }
        else{
            $arr = array('status'=>'true','message'=>'Success');
        }
        echo json_encode($arr);
    }
    public function check_phone(Request $request){
        $phone=Customer::select('Phone')->where('Phone',$request->input('Phone'))->get()->toArray();
        if($phone){
            $arr = array('status'=>'false','message'=>'Phone Exists');
        }
        else{
            $arr = array('status'=>'true','message'=>'Success');
        }
        echo json_encode($arr);
    }
    public function check_address(Request $request){
        $address=Customer::select('Address')->where('Address',$request->input('Address'))->get()->toArray();
        if($address){
            $arr = array('status'=>'false','message'=>'Address Exists');
        }
        else{
            $arr = array('status'=>'true','message'=>'Success');
        }
        echo json_encode($arr);
    }
    public function select_name(Request $request){
        $name=Customer::all()->where('Name',$request->input('Name'));
        if($name){
            $arr = array('status'=>'true','message'=>'Name Found','data'=>$name);
        }
       else{
        $arr = array('status'=>'false','message'=>'Name Not Found');
       }
        echo json_encode($arr);
    }
}
