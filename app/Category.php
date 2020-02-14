<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id';

    public function quests()
    {
        return $this->hasMany("App\Quest");
    }
}