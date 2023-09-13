<?php

namespace App\Http\Controllers;

use App\Models\MdProduct;
use App\Models\MdProductDetail;
use App\Models\MdProductModifier;
use Illuminate\Http\Request;

class MdProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request, $id = null)
    // {
    //  if($id != null){
    //         $query = MdProduct::where('md_product_category_id', $id)->get();
    //     }
    //     else{
    //         $query = MdProduct::with('client','brand', 'branch')->paginate(10);
    //         // $order_detail = OrderDetail::all();
    //     }
    //     return response()->json(['product'=>$query]);
    // }

    public function index(Request $request, $id = null)
{
    $search_product = $request->input('search_by_product');
    $search = $request->input('search');
    $product_id = $request->input('product_id');
    // $md_station_id = $request->input('md_station_id');
    $md_product_category_id = $request->input('md_product_category_id');
    $gift = $request->input('gift');

    $query = MdProduct::with('client', 'brand', 'branch');


    if ($id !== null) {
        $query->where('md_product_category_id', $id);
    }

    if ($search_product) {
        $query->where(function ($innerQuery) use ($search, $product_id, $md_product_category_id, $gift) {
            $innerQuery->where('product_name', 'LIKE', "%$search%")
                ->orWhere('md_product_id', "$product_id")
                ->orWhere('md_product_category_id', $md_product_category_id)
                ->orWhere('gift', "$gift");
        });
    }

    $products = $query->paginate(10);

    return response()->json(['products' => $products]);
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
        $data->product_code = $request->input('product_code');
        $data->product_name = $request->input('product_name');
        $data->product_price = $request->input('product_price');
        $data->deleting_method = $request->input('deleting_method');
        $data->total_weight = $request->input('total_weight');
        $data->barcode = $request->input('barcode');
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

        $latestMdProductId = MdProduct::max('md_product_id');

        $product_detail = $request->input('product_detail');
        $product_modifiers = $request->input('product_modifiers');


        if ($product_detail) {
            foreach($product_detail as $item){
                $cdata = new MdProductDetail();
                 $cdata->md_product_id = $latestMdProductId;
                 $cdata->md_detail_id = $item['md_detail_id'];
                 $cdata->product_type = $item['product_type'];
                 $cdata->gross = $item['gross'];
                 $cdata->cost = $item['cost'];
                 $cdata->save();
            }
        }

        if ($product_modifiers) {
            foreach($product_modifiers as $product_modifier){
                $modifierData = new MdProductModifier();
                 $modifierData->md_product_id = $latestMdProductId;
                 $modifierData->md_modifier_id = $product_modifier['md_modifier_id'];
                 $modifierData->save();
            }
        }

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
        $data->deleting_method = $request->input('deleting_method');
        $data->total_weight = $request->input('total_weight');
        $data->barcode = $request->input('barcode');
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

        $product_detail = $request->input('product_detail');
        $product_modifiers = $request->input('product_modifiers');

         $delete_product_detail = MdProductDetail::where('md_product_id', $id)->delete();
        if ($product_detail) {
            foreach($product_detail as $item){
                $cdata = new MdProductDetail();
                 $cdata->md_product_id = $id;
                 $cdata->md_detail_id = $item['md_detail_id'];
                 $cdata->product_type = $item['product_type'];
                 $cdata->gross = $item['gross'];
                 $cdata->cost = $item['cost'];

                 $cdata->save();
            }
        }
        $delete_product_modifier = MdProductModifier::where('md_product_id', $id)->delete();

        if ($product_modifiers) {
            foreach($product_modifiers as $product_modifier){
                $modifierData = new MdProductModifier();
                 $modifierData->md_product_id = $id;
                 $modifierData->md_modifier_id = $product_modifier['md_modifier_id'];
                 $modifierData->save();
            }
        }

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
