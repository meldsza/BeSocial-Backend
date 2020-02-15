<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\NGO;
use Auth;
use Illuminate\Http\Request;

class NGOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'identification_no' => 'string|required',
            'name' => 'string|required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        return NGO::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function show(NGO $nGO)
    {
        return 404;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NGO $nGO)
    {
        return 404; //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function destroy(NGO $nGO)
    {
        return 404; //
    }
}
