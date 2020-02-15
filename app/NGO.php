<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NGO extends Model
{
    protected $fillable = ['identification_number', 'name', 'user_id', 'latitude', 'longitude'];
    public function user()
    {
        return $this->belongsTo("App\User", 'user_id');
    }
}
