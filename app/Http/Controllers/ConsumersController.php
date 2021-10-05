<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsumerRequest;
use App\Http\Resources\ConsumerResource;
use App\Models\Bill;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Consumer::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConsumerRequest $request)
    {
        //
        $consumer = Consumer::create([
            'name' => $request->name,
            'age' => $request->age,
            'contact_num' => $request->contact_num,
            'meter_num' => $request->meter_num
        ]);

        return response()->json($consumer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function show(Consumer $consumer)
    {
        //
        // dd($consumer->bills);
        return new ConsumerResource($consumer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumer $consumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function update(CreateConsumerRequest $request, Consumer $consumer)
    {
        //
        $consumer->update([
            'name' => $request->name,
            'age' => $request->age,
            'contact_num' => $request->contact_num,
            'meter_num' => $request->meter_num
        ]);

        return response()->json($consumer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumer $consumer)
    {
        //
        $consumer->delete();
        return response()->json(null, 204);
    }

    // public function bills(Consumer $consumer)
    // {
    //     $bills = $consumer->bills;
    //     return response()->json($bills, 200);
    // }
}
