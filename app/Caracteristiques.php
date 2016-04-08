<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristiques extends Model {

    protected $fillable = [
        'name', 'value', 'type_materiel_id'
    ];

    public function materiel() {
        return $this->belongsTo('App\Materiels');
    }

    public function type_materiel() {
        return $this->belongsTo('App\Type_materiels');
    }

}
