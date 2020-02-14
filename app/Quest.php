<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $table = 'quests';
    protected $fillable = [
        'user_id', 'name', 'category_id', 'points', 'status', 'description', 'latitude', 'longitude'
    ];
    protected $primaryKey = 'id';

    public function author()
    {
        return $this->belongsTo("App\User");
    }

    public function quest_logs()
    {
        return $this->hasMany("App\QuestLog");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
}