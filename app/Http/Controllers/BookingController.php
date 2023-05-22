<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BookingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $transactions = DB::table('transactions')->get();
        return view('booking.home', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $rooms = DB::table('rooms')->get();
        return view('booking.create', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'room_id' => 'required',
            'cust_name' => 'required|string|min:3|max:255',
            'trans_date' => 'required|date',
            'days' => 'required|integer|min:1',
            'extra_charge' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        } else {
            $data = $request->input();
            try{
                $room = Room::find($data['room_id']);

                $transaction = new Transaction;
                $transaction->trans_code = 'TRX-' . uniqid();
                $transaction->trans_date = $data['trans_date'];
                $transaction->cust_name = $data['cust_name'];
                $transaction->total_room_price = $room->price * $data['days'];
                $transaction->total_extra_charge = $data['extra_charge'];
                $transaction->final_total = $transaction->total_room_price + $transaction->total_extra_charge;
                $transaction->save();

                $transactionDetail = new DetailTransaction;
                $transactionDetail->trans_id = $transaction->id;
                $transactionDetail->room_id = $data['room_id'];
                $transactionDetail->days = $data['days'];
                $transactionDetail->sub_total_room = $room->price * $data['days'];
                $transactionDetail->extra_charge = $data['extra_charge'];
                $transactionDetail->save();

                return redirect('/booking')->withInput()->with('success', "Transaction data successfully entered");
            } catch(Exception $e){
                return redirect('/booking')->withInput()->with('error', "Transaction data failed to be entered!");
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
            $room = Transaction::find($id);
            $room->delete();
            return redirect()->back()->withInput()->with('success', "Transaction data successfully deleted");
        } catch(Exception $e){
            return redirect()->back()->withInput()->with('error', "Transaction data failed to delete!");
        }
    }
}
