<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiels extends Model {

    protected $fillable = [
        'name', 'serial_number', 'bought', 'price'
    ];

    public function salles() {
        return $this->belongsTo('App\Salles');
    }

    public function type_materiel() {
        return $this->belongsTo('App\Type_materiels');
    }

    public function caracteristiques() {
        return $this->hasMany('App\Caracteristiques');
    }
}
