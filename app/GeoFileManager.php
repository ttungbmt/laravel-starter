<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class GeoFileManager extends Model {
    use NodeTrait;

    public $table = 'geo_files_manager';

    public $fillable = ['name'];

    /**
     * Get the comments for the blog post.
     */
    public function file()
    {
        return $this->hasOne(GeoFile::class, 'manager_id');
    }
}
