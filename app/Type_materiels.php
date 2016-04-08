<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_materiels extends Model {

    protected $fillable = [
        'name'
    ];

    public function materiels() {
        return $this->hasMany('App\Materiels');
    }

}
