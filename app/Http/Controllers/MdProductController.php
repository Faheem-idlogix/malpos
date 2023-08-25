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
            $product = MdProduct::with('client','brand', 'branch')->get();
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
        $data = new MdProduct();
        // $data->product_code = $request->product_code;
        // $data->product_name = $request->product_name;
        // $data->product_price = $request->product_price;
        // $data->md_product_category_id = $request->md_product_category_id;
        // $data->cd_client_id = $request->cd_client_id;
        // $data->cd_brand_id = $request->cd_brand_id;
        // $data->cd_branch_id = $request->cd_branch_id;
        // $data->is_active = $request->is_active ?? '1';
        // $data->created_by = $request->created_by;
        // $data->updated_by = $request->updated_by;
        // $data->td_tax_category_id = $request->td_tax_category_id;
        $data->product_code = $request->input('product_code');
        $data->product_name = $request->input('product_name');
        $data->product_price = $request->input('product_price');
        $data->barcode = $request->input('barcode');
        $data->md_station_id = $request->input('md_station_id');
        $data->maximun_day_of_product_return = $request->input('maximun_day_of_product_return');
        $data->cooking_time = $request->input('cooking_time');
        $data->description = $request->input('description');
        $data->md_allergy_id = $request->input('md_allergy_id');
        $data->md_diet_id = $request->input('md_diet_id');
        $data->gift = $request->input('gift');
        $data->portion = $request->input('portion');
        $data->bundle = $request->input('bundle');
        $data->not_allow_apply_discount = $request->input('not_allow_apply_discount');
        $data->sold_by_weight = $request->input('sold_by_weight');
        $data->sale_price = $request->input('sale_price');
        $data->md_product_category_id = $request->input('md_product_category_id');
        $data->td_tax_category_id = $request->input('td_tax_category_id');
        $data->cd_client_id = $request->input('cd_client_id');
        $data->cd_brand_id = $request->input('cd_brand_id');
        $data->cd_branch_id = $request->input('cd_branch_id');
        $data->is_active = $request->input('is_active', '1');
        $data->created_by = $request->input('created_by');
        $data->updated_by = $request->input('updated_by');

        if ($image = $request->file('product_image')) {
            $destinationPath = public_path('img/product_image/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->product_image = $profileImage;
        }
        $data->save();
        return response()->json($data);
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
    public function edit( $id)
    {
        //
        $data = MdProduct::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data =  MdProduct::find($id);
        $data->product_code = $request->input('product_code');
        $data->product_name = $request->input('product_name');
        $data->product_price = $request->input('product_price');
        $data->barcode = $request->input('barcode');
        $data->md_station_id = $request->input('md_station_id');
        $data->maximun_day_of_product_return = $request->input('maximun_day_of_product_return');
        $data->cooking_time = $request->input('cooking_time');
        $data->description = $request->input('description');
        $data->md_allergy_id = $request->input('md_allergy_id');
        $data->md_diet_id = $request->input('md_diet_id');
        $data->gift = $request->input('gift');
        $data->portion = $request->input('portion');
        $data->bundle = $request->input('bundle');
        $data->not_allow_apply_discount = $request->input('not_allow_apply_discount');
        $data->sold_by_weight = $request->input('sold_by_weight');
        $data->sale_price = $request->input('sale_price');
        $data->md_product_category_id = $request->input('md_product_category_id');
        $data->td_tax_category_id = $request->input('td_tax_category_id');
        $data->cd_client_id = $request->input('cd_client_id');
        $data->cd_brand_id = $request->input('cd_brand_id');
        $data->cd_branch_id = $request->input('cd_branch_id');
        $data->is_active = $request->input('is_active', '1');
        $data->created_by = $request->input('created_by');
        $data->updated_by = $request->input('updated_by');


        if ($image = $request->file('product_image')) {
            $destinationPath = public_path('img/product_image/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->product_image = $profileImage;
        }
        $data->save();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = MdProduct::find($id);
        $data->delete();
        return response()->json($data);
    }
}
