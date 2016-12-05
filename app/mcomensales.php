<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcomensales extends Model
{
    public $timestamps = false;
    protected $fillable = ['cnomcom','capecom','cdnicom','ctelcom','cclavcom','nnummenucom','cestcom'];
}
