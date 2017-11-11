<?php

namespace Wiskunde;

use Illuminate\Database\Eloquent\Model;

class Subchapter extends Model
{
    //

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nr', 'name', 'chapter_id',
    ];


}
