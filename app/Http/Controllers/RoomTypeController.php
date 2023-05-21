<?php

namespace App\Http\Controllers;

use DB;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RoomTypeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $room_types = DB::table('room_types')->get();
        return view('room_type.home', ['room_types' => $room_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('room_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'room_type' => 'required|string|min:3|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        } else {
            $data = $request->input();
            try{
                $room_type = new RoomType;
                $room_type->room_type = $data['room_type'];
                $room_type->save();
                return redirect('/room_type')->withInput()->with('success', "Room type data successfully entered");
            } catch(Exception $e){
                return redirect('/room_type')->withInput()->with('error', "Room type data failed to be entered!");
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
        $room_type = RoomType::whereId($id)->first();

        return view('room_type.edit', ['room_type' => $room_type]);
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
            'room_type' => 'required|string|min:3|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        } else {
            $data = $request->input();
            try{
                $room_type = RoomType::find($id);
                $room_type->room_type = $data['room_type'];
                $room_type->save();
                return redirect('/room_type')->withInput()->with('success', "Room type data successfully updated");
            } catch(Exception $e){
                return redirect('/room_type')->withInput()->with('error', "Room type data failed to update!");
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
            $room_type = RoomType::find($id);
            $room_type->delete();
            return redirect()->back()->withInput()->with('success', "Room type data successfully deleted");
        } catch(Exception $e){
            return redirect()->back()->withInput()->with('error', "Room type data failed to delete!");
        }
    }
}
