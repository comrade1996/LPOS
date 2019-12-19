<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Unit extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','created_by'
    ];

    protected static function boot()
    {
        parent::boot();
        Category::saving(function ($model) {

                $model->created_by = Auth::user()->name;


        });
    }

}
