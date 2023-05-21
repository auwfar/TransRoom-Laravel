<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RoomController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $rooms = DB::table('rooms')
                ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
                ->select('room_types.room_type', 'rooms.id', 'rooms.room_name', 'rooms.area', 'rooms.price', 'rooms.facility')
                ->get();
        return view('room.home', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roomTypes = DB::table('room_types')->get();
        return view('room.create', ['room_types' => $roomTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'room_type_id' => 'required',
            'room_name' => 'required|string|min:3|max:255',
            'area' => 'required|string|min:3|max:255',
            'price' => 'required|numeric',
            'facility' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        } else {
            $data = $request->input();
            try{
                $room = new Room;
                $room->room_type_id = $data['room_type_id'];
                $room->room_name = $data['room_name'];
                $room->area = $data['area'];
                $room->price = $data['price'];
                $room->facility = $data['facility'];
                $room->save();
                return redirect('/room')->withInput()->with('success', "Room data successfully entered");
            } catch(Exception $e){
                return redirect('/room')->withInput()->with('error', "Room data failed to be entered!");
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $roomTypes = DB::table('room_types')->get();
        $room = Room::whereId($id)->first();

        return view('room.edit', ["room" => $room, 'room_types' => $roomTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = [
            'room_type_id' => 'required',
            'room_name' => 'required|string|min:3|max:255',
            'area' => 'required|string|min:3|max:255',
            'price' => 'required|numeric',
            'facility' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        } else {
            $data = $request->input();
            try{
                $room = Room::find($id);
                $room->room_type_id = $data['room_type_id'];
                $room->room_name = $data['room_name'];
                $room->area = $data['area'];
                $room->price = $data['price'];
                $room->facility = $data['facility'];
                $room->save();
                return redirect('/room')->withInput()->with('success', "Room data successfully updated");
            } catch(Exception $e){
                return redirect('/room')->withInput()->with('error', "Room data failed to update!");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $room = Room::find($id);
            $room->delete();
            return redirect()->back()->withInput()->with('success', "Room data successfully deleted");
        } catch(Exception $e){
            return redirect()->back()->withInput()->with('error', "Room data failed to delete!");
        }
    }
}
