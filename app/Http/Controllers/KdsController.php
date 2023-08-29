<?php

namespace App\Http\Controllers;

use App\Models\Kds;
use App\Models\TdSaleOrderItem;
use App\Models\TdSaleOrder;


use Illuminate\Http\Request;

class KdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $station_id = $request->md_station_id;
        $data = TdSaleOrderItem::with('td_sale_order','md_product')->where('md_station_id', $station_id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */

     
     public function show_kds(Request $request){
        $station_id = $request->md_station_id;
        $data = TdSaleOrderItem::with(['td_sale_order', 'md_product'])
        ->whereHas('md_product', function ($query) use ($station_id) {
            $query->where('md_station_id', $station_id);
        })
        ->get();
        return response()->json($data);
     }


    public function edit(Kds $kds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $data = TdSaleOrderItem::find($id);
        $data->order_item_status = $request->order_item_status;
        $data->save();
        return response()->json($data);
    }

    public function filter(Request $request )
    {
        $filter = $request->filter;
        $data = TdSaleOrder::with('td_sale_order_item')->where('order_item_status' , $filter)->get();
        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kds $kds)
    {
        //
    }
}
