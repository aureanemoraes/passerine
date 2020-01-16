<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bird extends Model
{
    use SoftDeletes;

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
