<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    protected $fillable = ['title', 'address', 'available', 'description', 'photos', 'status'];

    public function trueque()
    {
        return $this->hasMany('App\Trueque');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
