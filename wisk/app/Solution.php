<?php

namespace Wiskunde;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solution extends Model
{
    use SoftDeletes;
    protected $table = 'solution';
    protected $dates = ['deleted_at'];
}
