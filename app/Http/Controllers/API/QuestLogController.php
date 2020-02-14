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
        if($request->has('q'))
            $questLog = QuestLog::where('name', 'LIKE', '%' . $request->input('q') . '%')->paginate(50);
        else
            $questLog = QuestLog::paginate(50);
        return $questLog;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['quest_id' => 'integer|required']);
        $data['user_id'] = $request->user_id;
        $data['status'] = 0;
        $questLog = QuestLog::create($data);

        return $questLog;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestLog  $questLog
     * @return \Illuminate\Http\Response
     */
    public function show(QuestLog $questLog)
    {
        return $questLog;
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
        return 404;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestLog  $questLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestLog $questLog)
    {
        return 404;
    }

    public function completed(QuestLog $questLog)
    {
        $questLog->status = 1;
        $user = $questLog->user;
        $user->points += $questLog->quest->points;
        $user->save();
        $questLog->save();
    }
}
