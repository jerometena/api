<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Consumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBillRequest;
use App\Http\Resources\BillResource;
use App\Http\Resources\ConsumerResource;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        // dd(Consumer::find($id));
        // return response()->json(Consumer::find($id)->bills, 200);
        return new ConsumerResource(Consumer::find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBillRequest $request, $id)
    {
        // dd($request->image);
        $image = $request->image->store('bills', 'public');
        $bill = Bill::create([
            'amount' => $request->amount,
            'paid' => $request->paid,
            'rate' => $request->rate,
            'reading_date' => $request->reading_date,
            'disconnection_date' => $request->disconnection_date,
            'due_date' => $request->due_date,
            'image' => $image,
            'status' => $request->status,
            'consumer_id' => $id,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
        ]);
        return response()->json($bill, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show($consumer_id, Bill $bill)
    {
        // dd(Consumer::find($consumer_id)->bills->where('id', $bill->id));
        return new BillResource(Consumer::find($consumer_id)->bills->where('id', $bill->id)->first());

        // return response()->json(Consumer::find($consumer_id)->bills->where('id', $bill_id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $consumer_id, Bill $bill)
    {
        // $bills = Consumer::find($consumer_id)->bills->where('id', $bill->id)->first();
        // dd($bill->user_id);
        if (auth()->user()->id != $bill->user_id) {
            return response()->json([
                'message' => 'You cannot perform this operation!!'
            ], 401);
        }

        Consumer::find($consumer_id)->bills->where('id', $bill->id)->first()->update([
            'amount' => $request->amount,
            'paid' => $request->paid,
            'rate' => $request->rate,
            'reading_date' => $request->reading_date,
            'disconnection_date' => $request->disconnection_date,
            'due_date' => $request->due_date,
            'image' => $request->image,
            'status' => $request->status,
        ]);

        return response()->json($bill, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($consumer_id, Bill $bill)
    {

        // dd(Consumer::find($consumer_id)->bills->where('id', $bill->id)->first());
        Consumer::find($consumer_id)->bills->where('id', $bill->id)->first()->delete();
        return response()->json(null, 204);
    }

    public function bills()
    {
        // return response()->json(Bill::get(), 200);
        $consumers = Consumer::all();
        // dd($bills);
        foreach ($consumers as $consumer) {
            $arr[] = new ConsumerResource($consumer);
        }
        return $arr;
    }

    public function dues()
    {
        // dd(date('Y-m-d'));
        $bills = Bill::all()->where('status', '=', 'unpaid')->where('due_date', '<=', date('Y-m-d'));
        foreach ($bills as $bill) {
            $arr[] = new ConsumerResource($bill->consumer);
        }
        // $bills = DB::table('bills')->where('status', 'unpaid')->whereDate('due_date', '<=', now())->get();
        // dd($bills);
        // foreach ($bills as $bill) {
        //     dd($bill);
        //     // $arr[] = new ConsumerResource($bill->bills);
        // }
        return response()->json($arr, 200);
    }
}
