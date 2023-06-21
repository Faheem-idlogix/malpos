<?php

namespace App\Http\Controllers;

use App\Models\MdProduct;
use Illuminate\Http\Request;

class MdProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
     if($id != null){
            $product = MdProduct::where('md_product_category_id', $id)->get();
        }
        else{
            $product = MdProduct::all();
            // $order_detail = OrderDetail::all();
        }
        return response()->json(['product'=>$product]);
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
    public function show(MdProduct $mdProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdProduct $mdProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdProduct $mdProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdProduct $mdProduct)
    {
        //
    }
}
