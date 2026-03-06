<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reservation;
use App\Models\Customer;
use App\Models\Room;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $res=Reservation::with('customer')->get(); 
        $a=Customer::select('Customer_Id')->where('Name','George')->get();
        foreach($a as $r1){
            $m=$r1->Customer_Id;
        }
        $b=Reservation::all()->where('Customer_Id',$m);
       return view('reservations.index',['res'=>$res]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('reservations.create');
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
            "name"=>['required',"string"],
            "number"=>['required',"integer"],
            "check-in"=>['required'],
            "check-out"=>['required'],
        ]);
        $check_Name=Customer::select('Name')->where('Name',$request->input('name'))->exists();
        $check_Room=Reservation::select('Room_Number')
        ->where('Check_In','>=',$request->input('check-in'))
        ->where('Check_Out','<=',$request->input('check-out'))
        ->where('Room_Number',$request->input('number'))
        ->exists();
        if(!$check_Name){
            return redirect()->route("reservations.create")->with('Error_Name','Name Is Not Registerd');
            }
        else if($check_Room){
        return redirect()->route("reservations.create")->with('Error_Room','Room Is Registered Between These Dates');
        }
        else{
        $check_Id=Customer::select('Customer_Id')->where('Name',$request->input('name'))->get();
        foreach($check_Id as $c){
            $b=$c->Customer_Id;
        }
            $reservation=new Reservation();
            $reservation->Room_Number=$request->input('number');
            $reservation->Customer_Id=$b;
            $reservation->Check_In=$request->input('check-in');
            $reservation->Check_Out=$request->input('check-out');
            $reservation->Status='Pending';
            Room::where('Room_Number',$request->input('number'))->update(['Status'=>'Reserved']);
            $reservation->save();
            return redirect()->route("reservations.create")->with('Verify','Reservation Added');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Reservation::find($id);
        return view('reservations.show',['show'=>$show]);    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Reservation::find($id);     
        return view('reservations.edit',['edit'=>$edit]);
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
            "number"=>['required',"integer"],
            "check-in"=>['required'],
            "check-out"=>['required'],
        ]);
        $check_Name=Customer::select('Name')->where('Name',$request->input('name'))->exists();
        $check_Room=Reservation::select('Room_Number')
        ->where('Check_In','>=',$request->input('check-in'))
        ->where('Check_Out','<=',$request->input('check-out'))
        ->where('Room_Number',$request->input('number'))
        ->exists();
        if(!$check_Name){
            return redirect()->route("reservations.create")->with('Error_Name','Name Is Not Registerd');
            }
        else if($check_Room){
        return redirect()->route("reservations.create")->with('Error_Room','Room Is Registered Between These Dates');
        }
        else{
        $check_Id=Customer::select('Customer_Id')->where('Name',$request->input('name'))->get();
        foreach($check_Id as $c){
            $b=$c->Customer_Id;
        }
            $reservation=Reservation::find($id);
            $reservation->Room_Number=$request->input('number');
            $reservation->Customer_Id=$b;
            $reservation->Check_In=$request->input('check-in');
            $reservation->Check_Out=$request->input('check-out');
            if($request->input('Status')=='Accepted'){
                $reservation->Status='Accepted';
            }
            elseif($request->input('Status')=='Canceled'){
                $reservation->Status='Canceled';
            }
            else{
                $reservation->Status='Pending';
            }
            $reservation->save();
            return redirect()->route('reservations.update',$id);    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Reservation::find($id);
        $check=Reservation::select('Room_Number')->where('Reservation_Id',$id)->get();
        foreach($check as $c){
            $b=$c->Room_Number;
        }
        Room::where('Room_Number',$b)->update(['Status'=>'Available']);
        $delete->delete();
        return redirect()->route("reservations.index",$id);   
     }
     public function checked(){
        $checked=Reservation::all()->where('Check_Out',date("Y-m-d"));
        return view('reservations.checked',['checked'=>$checked]);  
     }
     public function rooms_available(Request $request){
        $r='';
        $check_in=$request->input('Check_In');
        $check_out=$request->input('Check_Out');
        // $res=Room::all()->whereNotIn('Room_Number',function($query,$check_in,$check_out){
        //     $query->select('Room_Number')->from('reservations')->
        //     where('Check_In','>=',$check_in)->
        //     where('Check_Out','<=',$check_out)->
        //     get();
        // });
        $a=Reservation::select('Room_Number')->
        where('Check_In','>=',$request->input('Check_In'))->      
        where('Check_Out','<=',$request->input('Check_Out'))->
        get();
        foreach($a as $m){
            $r=$m->Room_Number;
        }
        $res=Room::all()->whereNotIn('Room_Number',$r);
        if($res){
            $arr = array('status'=>'true','message'=>'Founded Rooms','data'=>$res);
        }
        else{
            $arr = array('status'=>'false','message'=>'Did Not Found Any Rooms');
        }
        echo json_encode($arr);
     }
     public function check_reservation(Request $request){
        $m='';
        $a=Customer::select('Customer_Id')->where('Name',$request->input('Name'))->get();
        foreach($a as $r1){
            $m=$r1->Customer_Id;
        }
        $res=Reservation::all()->where('Customer_Id',$m);
         //$res=Customer::with('reservation')->where('Name',$request->input('Name'))->get();
        if($res){
            $arr = array('status'=>'true','message'=>'Reservations Founded','data'=>$res);
        }
        echo json_encode($arr);
     }
    public function save_reservation(Request $request){
        $validator=Validator::make($request->all(),['Name'=>'required','Room_Number'=>'required','Check_In'=>'required','Check_Out'=>'required']);
        if($validator->passes())
        {
            $check_Id=Customer::select('Customer_Id')->where('Name',$request->input('Name'))->get();
         foreach($check_Id as $c){
            $b=$c->Customer_Id;
         }
            $obj = new Reservation();
            $obj->Room_Number = $request->input('Room_Number');
            $obj->Customer_Id=$b;
            $obj->Check_In = $request->input('Check_In');
            $obj->Check_Out = $request->input('Check_Out');
            $obj->Status='Pending';
            Room::where('Room_Number',$request->input('Room_Number'))->update(['Status'=>'Reserved']);
            $obj->save();
            $arr = array('status'=>'true','message'=>'Contect Query Successfully Send');
            }
        else 
        {
            $arr = array('status'=>'false','message'=>$validator->errors()->all());
        }
        echo json_encode($arr);
    }
}
