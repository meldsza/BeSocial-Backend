<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\QuestLog;
use Illuminate\Http\Request;

class QuestLogController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(QuestLog::class, 'questLog');
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestLog  $questLog
     * @return \Illuminate\Http\Response
     */
    public function show(QuestLog $questLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestLog  $questLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestLog $questLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestLog  $questLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestLog $questLog)
    {
        //
    }
}
