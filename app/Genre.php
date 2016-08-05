<?php

namespace Remolque;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "genres";

    protected $fillable = ['genre'];
}
