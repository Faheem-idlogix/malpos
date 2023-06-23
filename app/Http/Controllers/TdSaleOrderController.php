<?php

namespace App\Http\Controllers;

use App\Models\TdSaleOrder;
use Illuminate\Http\Request;
use App\Models\TdSaleOrderItem;

class TdSaleOrderController extends Controller
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
    $currentTimestamp = time();
    $currentDateTime = date('Y-m-d H:i:s', $currentTimestamp);
    $data = new TdSaleOrder();
    $data->customer = 'Admin';
    $data->status = 'paid';
    $data->src = 'null';
    $data->time = $currentDateTime;
    $data->order_type = $request->order_type;
    $data->order_amount = $request->order_amount;
    $data->user_id = '1';
    $data->discount = $request->discount;
    $data->td_sale_order_code = $data->TdSaleOrderCode();
    $data->cd_client_id = '1';
    $data->cd_brand_id = '1';
    $data->cd_branch_id = '1';
    $data->is_active = '1';
    $data->created_by = '1';
    $data->updated_by = '1';
    $data->save();

    $latestOrderId = TdSaleOrder::latest('td_sale_order_id')->pluck('td_sale_order_id')->first();
    $orderId = $latestOrderId;

    $orderDetails['td_sale_order_id'] = $orderId;

    foreach ($request->products as $product) {
        $orderDetails = new TdSaleOrderItem();

        $orderDetails->product_id = $product['product_id'];
        $orderDetails->qty = $product['qty'];
        $orderDetails->price = $product['price'];
        $orderDetails->cd_client_id = '1';
        $orderDetails->cd_brand_id = '1';
        $orderDetails->cd_branch_id = '1';
        $orderDetails->is_active = '1';
        $orderDetails->created_by = '1';
        $orderDetails->updated_by = '1';
        $orderDetails->order_id = $latestOrderId;
        $orderDetails->save();
    }

    return response()->json($data);
}


    /**
     * Display the specified resource.
     */
    public function show(TdSaleOrder $tdSaleOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TdSaleOrder $tdSaleOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TdSaleOrder $tdSaleOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TdSaleOrder $tdSaleOrder)
    {
        //
    }
}
