<?php

namespace App\Http\Controllers;

use App\Models\MdIngredientCategory;
use Illuminate\Http\Request;

class MdIngredientCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = MdIngredientCategory::all();
        return response()->json($data);
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
        $data = new MdIngredientCategory();
        $data->name = $request->name;
        $data->parent_category_id = $request->parent_category_id;
        $data->count = $request->count;
        $data->qr_menu_count = $request->qr_menu_count;
        $data->cd_client_id = $request->cd_client_id;
        $data->cd_brand_id = $request->cd_brand_id;
        $data->cd_branch_id = $request->cd_branch_id;
        $data->is_active = $request->is_active ?? '1';
        $data->created_by = $request->created_by;
        $data->updated_by = $request->updated_by;
        if ($image = $request->file('ingredient_category_image')) {
            $destinationPath = public_path('img/ingredient_category_image/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->ingredient_category_image = $profileImage;
        }
        $data->save();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(MdIngredientCategory $mdIngredientCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $data = MdIngredientCategory::find($id);
        $data->delete();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $data =  MdIngredientCategory::find($id);
        $data->name = $request->name;
        $data->parent_category_id = $request->parent_category_id;
        $data->count = $request->count;
        $data->qr_menu_count = $request->qr_menu_count;
        $data->cd_client_id = $request->cd_client_id;
        $data->cd_brand_id = $request->cd_brand_id;
        $data->cd_branch_id = $request->cd_branch_id;
        $data->is_active = $request->is_active ?? '1';
        $data->created_by = $request->created_by;
        $data->updated_by = $request->updated_by;
        if ($image = $request->file('image')) {
            $destinationPath = public_path('img/ingredient_category_image/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->image = $profileImage;
        }
        $data->save();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $data = MdIngredientCategory::find($id);
        $data->delete();
        return response()->json($data);
    }
}
