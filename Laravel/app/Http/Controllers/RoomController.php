<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::all();
        return view('rooms.index',['rooms'=>$rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            "price"=>['required',"integer"],
            "information"=>['required',"string"],
        ]);
    
            $room=new Room();
            $room->Room_Type=$request->input('type');
            $room->Price=$request->input('price');
            $room->Information=$request->input('information');
            $room->Status='Available';
            $room->save();
            return redirect()->route("rooms.create")->with('Verify','Room Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Room::find($id);
        return view('rooms.show',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Room::find($id);
        return view('rooms.edit',['edit'=>$edit]);   
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
            "price"=>['required',"integer"],
            "information"=>['required',"string"],
        ]);
    
            $room=Room::find($id);
            $room->Room_Type=$request->input('type');
            $room->Price=$request->input('price');
            $room->Information=$request->input('information');
            $room->save();
            return redirect()->route("rooms.update",$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Room::find($id);
        $delete->delete();
        return redirect()->route("rooms.index",$id);
    }
    public function available(Request $request){   
        $r='';
        $req = $request->all();
        if($req == null){
        return view('rooms.available',['rooms'=>null]); 
        }
        $checkin = $request->input('check-in');
        $checkout = $request->input('check-out');
        $a=Reservation::with('room')->select('Room_Number')->
        where('Check_In','>=',$request->input('check-in'))->      
        where('Check_Out','<=',$request->input('check-out'))->
        get();
        foreach($a as $m){
            $r=$m->Room_Number;
        }
        $res=Room::all()->whereNotIn('Room_Number',$r);
        // $res=Room::all()->whereNotIn('Room_Number',function($query,$check_in,$check_out){

        //     $query->select('Room_Number')->from('reservations')->
        //     where('Check_In','>=',$check_in)->
        //     where('Check_Out','<=',$check_out)->
        //     get();
        // });
        return view('rooms.available', ['rooms'=> $res]);  
     }
    public function check_available_rooms(Request $request){
        $a=Reservation::select('Room_Number')->
        where('Check_In','>=',$request->input('check-in'))->      
        where('Check_Out','<=',$request->input('check-out'))->
        get();
        foreach($a as $m){
            $r=$m->Room_Number;
        }
        $res=Room::all()->whereNotIn('Room_Number',$r);
        return view('rooms.available');  
    }
}
