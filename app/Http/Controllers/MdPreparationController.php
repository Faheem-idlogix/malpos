<?php

namespace App\Http\Controllers;

use App\Models\MdPreparation;
use Illuminate\Http\Request;

class MdPreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = MdPreparation::all();
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
        $data = new MdPreparation();
        $data->name = $request->name;
        $data->md_ingredient_category_id = $request->md_ingredient_category_id;
        $data->recipe_output = $request->recipe_output;
        $data->description = $request->description;
        $data->deleting_method = $request->deleting_method;
        $data->cd_client_id = $request->cd_client_id;
        $data->cd_brand_id = $request->cd_brand_id;
        $data->cd_branch_id = $request->cd_branch_id;
        $data->is_active = $request->is_active ?? '1';
        $data->created_by = $request->created_by;
        $data->updated_by = $request->updated_by;
        $data->save();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(MdPreparation $mdPreparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $data = MdPreparation::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = MdPreparation::find($id);
        $data->name = $request->name;
        $data->md_ingredient_category_id = $request->md_ingredient_category_id;
        $data->recipe_output = $request->recipe_output;
        $data->description = $request->description;
        $data->deleting_method = $request->deleting_method;
        $data->cd_client_id = $request->cd_client_id;
        $data->cd_brand_id = $request->cd_brand_id;
        $data->cd_branch_id = $request->cd_branch_id;
        $data->is_active = $request->is_active ?? '1';
        $data->created_by = $request->created_by;
        $data->updated_by = $request->updated_by;
        $data->save();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = MdPreparation::find($id);
        $data->delete();
        return response()->json($data);
    }
}
