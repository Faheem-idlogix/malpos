<?php

namespace App\Http\Controllers;

use App\Models\MdStation;
use Illuminate\Http\Request;

class MdStationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = MdStation::all();
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
        $data = new MdStation();
        $data->station_name = $request->station_name;
        $data->count = $request->count;
        $data->can_be_printed = $request->can_be_printed;
        $data->station_reminder = $request->station_reminder;
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
    public function show(MdStation $mdStation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $data = MdStation::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $data =  MdStation::find($id);
        $data->station_name = $request->station_name;
        $data->count = $request->count;
        $data->can_be_printed = $request->can_be_printed;
        $data->station_reminder = $request->station_reminder;
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
        //
        $data = MdStation::find($id);
        $data->delete();
        return response()->json($data);
    }
}
