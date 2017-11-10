<?php

namespace Wiskunde;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use SoftDeletes;
    protected $table = 'chapter';
    protected $dates = ['deleted_at'];
}
