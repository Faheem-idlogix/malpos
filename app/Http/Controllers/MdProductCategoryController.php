<?php

namespace App\Http\Controllers;

use App\Models\MdProductCategory;
use Database\Seeders\MdProductCategorySeeder;
use Illuminate\Http\Request;

class MdProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
     if($id != null){
            $product_category = MdProductCategory::where('product_category_id', $id)->get();
        }
        else{
            $product_category = MdProductCategory::all();
            // $order_detail = OrderDetail::all();
        }
        return response()->json(['product_category'=>$product_category]);
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
    public function show(MdProductCategory $mdProductCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MdProductCategory $mdProductCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MdProductCategory $mdProductCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MdProductCategory $mdProductCategory)
    {
        //
    }
}
