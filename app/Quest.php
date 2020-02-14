<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $table = 'quests';
    protected $fillable = [
        'user_id', 'category_id', 'points', 'status', 'description', 'latitude', 'longitude'
    ];
    protected $primaryKey = 'id';
}