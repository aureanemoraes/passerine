<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bird extends Model
{


    protected $primaryKey = "anilhaCode";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'anilhaCode', 'name', 'age', 'category', 'gender', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
