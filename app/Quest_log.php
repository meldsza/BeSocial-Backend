<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest_log extends Model
{
    protected $table = 'quest_logs';
    protected $fillable = [
        'quest_id', 'user_id', 'status'
    ];
    protected $primaryKey = 'id';
}