<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Quest::class, 'quest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('q'))
            $quests = Quest::where('name', 'LIKE', '%' . $request->input('q') . '%')->paginate(50);
        else
            $quests = Quest::paginate(50);
        return view('quests.index', ['quests' => $quests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'string|required', 'points' => 'integer|required']);
        $data['user_id'] = $request->user_id;
        $quests = Quest::create($data);

        return redirect(route('tasks'))->with('success', 'Quest added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        return view('quests.show', ['quest' => $quest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quest $quest)
    {
        $quest->update($request->validate(['name' => 'string|required', 'points' => 'integer|required']));
        return redirect(route('tasks'))->with('success', 'Quest updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        $quest->delete();
        return back()->with('success', 'Quest deleted.');
    }
}
