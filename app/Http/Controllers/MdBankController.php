<?php

namespace App\Http\Controllers;

use App\Models\MdBank;
use Illuminate\Http\Request;

class MdBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = MdBank::all();
        return response()->json(['data' => $data]);
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
        $data =new MdBank();
        $data->name = $request['name'];
         $data->save();
        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MdBank $mdBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $data = MdBank::find($id);
        return response()->json(['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $data = MdBank::find($id);
        $data->name = $request['name'];
         $data->save();
        return response()->json(['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $data = MdBank::find($id);
        $data->delete();
        return response()->json(['data' => $data]);

    }
}
