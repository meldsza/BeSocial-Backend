<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\QuestLog;
use Auth;
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
        if ($request->has('q')) {
            $questLog = QuestLog::where('name', 'LIKE', '%' . $request->input('q') . '%')->paginate(50);
        } else {
            $questLog = QuestLog::paginate(50);
        }

        return $questLog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myQuestLogs(Request $request)
    {
        return Auth::user()->quest_logs;
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
        $data['user_id'] = Auth::id();
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
        $questLog->update($request->all());
        return ["message" => 'Sucessfully updated'];
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function completed(QuestLog $questLog)
    {
        $questLog->status = 3;
        $quest = $questLog->quest;
        $org_user = $quest->author;

        $user = $questLog->user;
        $user->points = $user->points + $quest->points;

        $org_user->points = $org_user->points - $quest->points;
        $quest->status = 2;
        $org_user->save();
        $user->save();
        $questLog->save();
        $quest->save();
        return ['message' => 'completed'];
    }
}
