<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestLog extends Model
{
    protected $table = 'quest_logs';
    protected $fillable = [
        'quest_id', 'user_id', 'status'
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function quest()
    {
        return $this->belongsTo("App\Quest");
    }
}