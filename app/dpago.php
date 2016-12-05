<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dpago extends Model
{
    public $timestamps = false;
    protected $fillable = ['ncodcom','fpagocom','dfecpago','ncantmenu'];
}
