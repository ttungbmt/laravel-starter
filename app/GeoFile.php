<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class GeoFile extends Model
{
    use NodeTrait;
    public $fillable = ['name', 'code'];


}
