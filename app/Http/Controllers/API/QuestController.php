<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Quest;
use Auth;
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
        if ($request->has('q')) {
            $quests = Quest::where('name', 'LIKE', '%' . $request->input('q') . '%')->paginate(50);
        } else {
            $quests = Quest::paginate(50);
        }

        return $quests;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'string|required',
            'points' => 'integer|required',
            'description' => 'required',
            'category_id' => 'integer|required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        $data['status'] = 0;
        $quests = Quest::create($data);

        return $quests;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        return $quest;
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
        return $quest;
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
        return ['message' => 'Quest deleted.'];
    }
}
